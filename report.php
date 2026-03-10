<?php
$misconduct=$nameError=$description="";

$name= "";
$description= "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["misconduct"])){
        $misconductError= "Please choose an option";
    }else{ 
        $misconduct=$_POST["misconduct"];
    if(empty($_POST["name"])){
        $nameError= "Specify user in speculation";
    }else{
        $name=$_POST["name"];
    }
    if(empty($_POST["description"])){
        $description= "Description is needed for investigation";
    }else{
        $description=$_POST["description"];
    }
}


function validate($input){
    $input=trim($input);
    $input=stripslashes($$input);
    $input=htmlspecialchars($input);
    return $input;
}

?>