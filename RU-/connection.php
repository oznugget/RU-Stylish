<?php

$servername= "cs3-dev.ict.ru.ac.za";
$username="G24N9666";
$password="NtsAbo24";
$dbname="group4";
$conn =new mysqli($servername,$username,$password,$dbname);
if($conn-> connect_error){
    die("Connection failed: ".$conn->connect_error);
}
echo "Success";

$conn->close();
?>