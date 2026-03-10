<?php

$servername= "cs3-dev.ict.ru.ac.za"; //stays the same for everyone
$username="G24N9666"; // student id all capitals e.g. G+stuent id
$password="NtsAbo24"; //Find this on the email sent by the instructor
$dbname="group4";

$conn =new mysqli($servername,$username,$password,$dbname);
if($conn-> connect_error){
    die("Connection failed: ".$conn->connect_error);
}
echo "Connection was successful";


// $sql = "Select * from user;";
// $result = conn->query($sql);

// if($result->num_rows > 0){
//     while($row = $result->fetch_assoc()) {

//     echo "<table>";
//     echo "<tr><th>UserID</th><th>";
// }



?>

