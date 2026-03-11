<?php

$servername= "cs3-dev.ict.ru.ac.za"; //stays the same for everyone
$username="G24N9666"; // student id all capitals e.g. G+stuent id
$password="NtsAbo24"; //Find this on the email sent by the instructor
$dbname="group4";

$conn =new mysqli($servername,$username,$password,$dbname);
if($conn-> connect_error){
    die("Connection failed: ".$conn->connect_error);
}



// $sql = "Select * from user;";
// $result = conn->query($sql);

// if($result->num_rows > 0){
//     while($row = $result->fetch_assoc()) {

//     echo "<table>";
//     echo "<tr><th>UserID</th><th>";
// }



?>
<!-- 
/*
<?php
// Database connection details
$servername = "localhost";
$username = "db_user";
$password = "db_password";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize form data
$user_name = htmlspecialchars($_POST['user_name']);
$user_email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $user_name, $user_email); // "ss" means two string parameters

if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

*/
 -->
