<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $perp= validate($_POST["perp"]);
    $misconduct=validate($_POST["misconduct"]);
    $description= validate($_POST["description"]);
    

    try{
        require_once "connection.php";

        $query ="INSERT INTO report (MisconductType, MisconductDescription, ReportedUsername) VALUES (?,?,?);";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $misconduct, $perp, $description);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: report.php");
        die();

    }catch(Exception $e){
        die("Error found: ". $e->getMessage());
    }





}
function validate($input){
    $input=trim($input);
    $input=stripslashes($input);
    $input=htmlspecialchars($input);
    return $input;
}








