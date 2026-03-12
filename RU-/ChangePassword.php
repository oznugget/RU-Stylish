<?php
session_start();
require "connection.php";

$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['user_id'])) {
        header('Location: SignIn.php');
        exit;
    }

    $oldPassword = $_POST["Curpassword"];
    $newPassword = $_POST["Nwpassword"];
    $confirmPassword = $_POST["Cfpassword"];
    $userId = $_SESSION['user_id'];  //from sign in session

    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        $status = "All fields are required.";
    } elseif ($newPassword !== $confirmPassword) {
        $status = "New passwords do not match.";
    } else {
        
        $stmt = $conn->prepare("SELECT password FROM user WHERE UserID = ?");
        $stmt->bind_param("i", $userId); 
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
            
        if ($user && password_verify($oldPassword, $user['password'])) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $SQLQuery = $conn->prepare("UPDATE user SET password = ? WHERE UserID = ?"); //new password update query
            $SQLQuery->bind_param("si", $hashedPassword, $userId);

            if ($SQLQuery->execute()) {
                //display
                echo '<script>
                        alert("Password changed successfully!");
                        window.location.href = "index.php";   
                      </script>';
                exit; 

            } else {
                $status = "Error: " . $conn->error;
            }
        } else {
            $status = "Current password is incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=!, initial-scale=1.0">
    <title>Change Passsword</title>

    <style>
    
    body{
        display: flex;
        height:100vh;  
       align-items: center;
        justify-content: center;
        

        background-image: url("images/card_bg.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover; 


    }


    .chgpasssword{
        font-family:serif;
        display:flex;
         flex-direction:column;
        align-items: center;
        padding: 10 px;
        border-radius: 20px;
        border-style: double;
        justify-content: center;
        text-align:center;
         width:350px;
         padding-bottom:50px ;
         background-color: white;

          flex-direction:column;
         
    }



.button{
    margin:10px;
    padding:10px 20px;
    font-size:16px;
    cursor:pointer;
    

    }



button:hover {
    background-color: #0f766e;
    transform: translateY(-2px);
    box-shadow: 0px 8px 15px rgba(0,0,0,0.2);
}

button:active {
    transform: scale(0.96);
}


    h1{
        color:teal;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }




        
    </style>




</head>
<body>
<section class="chgpasssword">

    <h1>Change Password</h1>
    <br>
    
    <form action="" method="Post">

     <p ><?php echo $status; ?></p> <!--status msg from PHP -->

    <label for="OldPassword">Current Password </label>  <br>
    <input type="password" name="Curpassword" required>  <br>
  <br>
     <label for="NewPassword">New Password </label>  <br>
     <input type="password" name="Nwpassword" required>  <br>
  <br>
      <label for="ConfirmNewPassword">Confirm New Password </label>  <br>
      <input type="password" name="Cfpassword" required>  <br>
  <br>
    <button type="submit">Submit</button>
    </form>




</section>

    
</body>
</html>