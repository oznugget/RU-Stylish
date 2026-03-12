<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $perp= validate($_POST["perp"]);
    $misconduct=validate($_POST["misconduct"]);
    $description= validate($_POST["description"]);
    

    try{
        require_once "connection.php";

        $query ="INSERT INTO report (MisconductType, ReportedUsername, MisconductDescription) VALUES (?,?,?);";
        $data = $conn->prepare($query);
        var_dump($misconduct);
        $data->execute([$misconduct, $perp, $description]);
        $conn = null;
        $data = null;
        header("Location: report.php");
        die();

    }catch(PDOException $e){
        die("Error found: ". $e->getMessage());
    }





}/*else{
    header("Location: index.php");
}
*/
function validate($input){
    $input=trim($input);
    $input=stripslashes($input);
    // $input=htmlspecialchars($input);
    return $input;
}


// $misconduct=$nameError=$description="";


 
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     if(empty($_POST["misconduct"])){
//         $misconductError= "Please choose an option";
//     }else{ 
//         $misconduct=validate($_POST["misconduct"]);
//     if(empty($_POST["name"])){
//         $nameError= "Specify user in speculation";
//     }else{
//         $name=validate($_POST["name"]);
//     }
//     if(empty($_POST["description"])){
//         $description= "Description is needed for investigation";
//     }else{
//         $description=validate($_POST["description"]);
//     }
// }
// }







