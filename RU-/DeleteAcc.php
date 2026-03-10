
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
    <section class="deleteSection">

    <h1>Delete Account</h1>
    <br>

    <h4>Are you sure you want to delete your Account</h4>
    <br>

    <div>
    <button>Yes</button>        <button>No</button>
    <div>


    </section>
    
</body>
</html>