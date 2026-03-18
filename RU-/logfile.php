<?php 
session_start();




function readLoginLog() {
    $logFile = 'login_attempts.log';
    $attempts = [];


    if (!file_exists($logFile)){
        return   ['error' => 'No login attempts logged yet'];
    }
    


    //Read the file line  by line
     $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

     foreach($lines as $line){
              if (preg_match('/\[(.*?)\] IP: (.*?) \| User: (.*?) \| Status: (.*?) \|/', $line, $matches)) {
            $attempts[] = [
                'time' => $matches[1],
                'ip' => $matches[2],
                'user' => $matches[3],
                'status' => $matches[4]
            ];
        }
    }
    //return in referse so new one is first
    return  array_reverse($attempts); 

     }


//Detecting Brute forsde attempts 
function detectBruteForce($attempts, $timeWindow = 300, $threshold = 5) {
    $suspiciousIPs = [];
    $currentTime = time();



      foreach ($attempts as $attempt) {
        // Only check failed attempts
        if ($attempt['status'] == 'failed') {
            $ip = $attempt['ip'];
            $attemptTime = strtotime($attempt['time']);

            // Initialize if not exists
              if (($currentTime - $attemptTime) <= $timeWindow) {
            if (!isset($suspiciousIPs[$ip])) {
                $suspiciousIPs[$ip] = [
                    'count' => 0,
                    'first_attempt' => $attempt['time'],
                    'last_attempt' => $attempt['time'],
                    'usernames' => []
                ];
            }


                  
            $suspiciousIPs[$ip]['count']++;
             $suspiciousIPs[$ip]['last_attempt'] = $attempt['time'];

            if (!in_array($attempt['user'], $suspiciousIPs[$ip]['usernames'])) {
                    $suspiciousIPs[$ip]['usernames'][] = $attempt['user'];
                }
            }
      }
      }
            


      // Filter only IPs that exceed max
    $result = [];
    foreach ($suspiciousIPs as $ip => $data) {
        if ($data['count'] >= $threshold) {
            $result[$ip] = $data;
        }
    }

        return $result;
}


function getBlockedIPs() {
    $logFile = 'login_attempts.log';
    $blockedIPs = [];
    
    if (!file_exists($logFile)) {
        return $blockedIPs;
    }



     $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        if (strpos($line, 'Status: blocked') !== false) {
            if (preg_match('/IP: (.*?) \|/', $line, $matches)) {
                $ip = $matches[1];
                if (!in_array($ip, $blockedIPs)) {
                    $blockedIPs[] = $ip;
                }
            }
        }
    }
    
    return $blockedIPs;
}



$currentUser = isset($_SESSION['username']) ? $_SESSION['username'] : 'Not logged in';
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;


$loginAttempts = readLoginLog();
$total = count($loginAttempts);
$success = 0;
$failed = 0;



if (!isset($loginAttempts['error'])) {
    $total = count($loginAttempts);

foreach ($loginAttempts as $attempt) {
    if ($attempt['status'] == 'success') $success++;
    if ($attempt['status'] == 'failed') $failed++;
}
}


//detect brute force
$bruteForceIPs = [];
$blockedIPs = [];


if (!isset($loginAttempts['error'])) {
    // Check for 5+ failed attempts in last 5 minutes
    $bruteForceIPs = detectBruteForce($loginAttempts, 300, 5);
    
    // Get IPs that were blocked
    $blockedIPs = getBlockedIPs();
}




?>