<?php

$servername= "cs3-dev"; //stays the same for everyone
$username=""; // student id all capitals e.g. G+stuent id
$password=""; //Find this on the email sent by the instructor
$dbname="group4";
$conn =new mysqli($servername,$username,$password,$dbname);
if($conn-> connect_error){
    die("Connection failed: ".$con->connect_error);
}
    echo "Connection was successful";
?>

