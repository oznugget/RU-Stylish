<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $rating= validate($_POST["rating"]);
    $comment= validate($_POST["review"]);
    

    try{
        require_once "connection.php";

        $mysql ="INSERT INTO review (ReviewComment, Rating) VALUES (?,?);";
        $sql = $conn->prepare($mysql);
        $sql->execute([ $comment, $rating]);
        $conn = null;
        $sql = null;
        header("Location: review.php");
        die();

    }catch(PDOException $e){
        die("Error found: ". $e->getMessage());
    }


}

function validate($input){
    $input=trim($input);
    $input=stripslashes($input);
    $input=htmlspecialchars($input);
    return $input;
}
