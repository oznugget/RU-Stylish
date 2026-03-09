<?php

$servername= "cs3-dev";
$username="G24N9666";
$password="NtsAbo24";
$dbname="group4";
$conn =new mysqli($servername,$username,$password,$dbname);
if($conn-> connect_error){
    die("Connection failed: ".$con->connect_error);
}

?>