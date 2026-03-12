<?php
session_start();
require "connection.php";

$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['user_id'])) { //have to be logged in to delete account
        header('Location: SignIn.php');
        exit;
    }

    if (isset($_POST['cancel'])) {
        header('Location: index.php'); //go home
        exit;
    } else{
        $userId = $_SESSION['user_id'];
        $deleteQuery = $conn->prepare("DELETE FROM user WHERE UserID = ?"); //query to delete account
        $deleteQuery->bind_param("i", $userId);

        if ($deleteQuery->execute()) {
            session_unset();
            session_destroy();
            echo '<script>
                    alert("Account deleted successfully!");
                    window.location.href = "index.php";   
                  </script>';
            exit;         
        } else {
            $status = "Error: " . $conn->error;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>



<style>


    body{


        height:100vh;  
        align-items:center;
        background-image: url("images/delAcc.webp");
         background-repeat: no-repeat;
        background-position: center center;
        display:flex;

        align-items: center;
        justify-content: center;
  


        }


    .deleteSection{
        font-family:serif;
        display:flex;
         flex-direction:column;
        align-items: center;
        padding: 10 px;
        border-radius: 20px;
        border-style: double;
        justify-content: center;
        text-align:center;
         width:350px;
         padding-bottom:50px ;
         background-color: white;

          flex-direction:column;
         

       

    }
   
    .button{
    margin:10px;
    padding:10px 20px;
    font-size:16px;
    cursor:pointer;
    

    }

    button:hover {
    background-color: #0f766e;
    transform: translateY(-2px);
    box-shadow: 0px 8px 15px rgba(0,0,0,0.2);
}

button:active {
    transform: scale(0.96);
}


    h1{
        color:teal;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }



    </style>
    <?php require "connection.php" ?>
</head>
<body>
    <form class="deleteSection" method="post" action="DeleteAcc.php">

    <h1>Delete Account</h1>
    <br>

    <h4>Are you sure you want to delete your Account?</h4>
    <br>

    <button class="button" type="submit" name="submit" value="Submit"><b>Yes</b></button>
    <button class="button" type="submit" name="cancel" value="Cancel"><b>Cancel</b></button>


</form>
    
</body>
</html>