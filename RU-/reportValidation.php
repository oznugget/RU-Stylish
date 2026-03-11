<?php
$misconduct=$nameError=$description="";

$name= "";
$misconduct="";
$description= "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["misconduct"])){
        $misconductError= "Please choose an option";
    }else{ 
        $misconduct=validate($_POST["misconduct"]);
    if(empty($_POST["name"])){
        $nameError= "Specify user in speculation";
    }else{
        $name=validate($_POST["name"]);
    }
    if(empty($_POST["description"])){
        $description= "Description is needed for investigation";
    }else{
        $description=validate($_POST["description"]);
    }
}
}






function validate($input){
    $input=trim($input);
    $input=stripslashes($$input);
    $input=htmlspecialchars($input);
    return $input;
}

?>