
<!DOCTYPE html>
<html lang="en">
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>



<style>
html{
font-size: 1rem;
font-family: "TikTok Sans", sans-serif;  
}


    body{


        height:100vh;  
        align-items:center;
        background-image: url("images/delAcc.webp");
        background-position: top;
        background-repeat: no-repeat;
        background-size: cover;
        display:flex;
        font-family: "TikTok Sans";


        align-items: center;
        justify-content: center;
  


        }


    .deleteSection{
        font-family: "TikTok Sans";

        display:flex;
         flex-direction:column;
        align-items: center;
        padding: 10 px;
        border-radius: 20px;
        border-style: solid;
        justify-content: center;
        text-align:center;
         width:350px;
         padding-bottom:50px ;
        background-image:url("images/nav.png");
          flex-direction:column;
                  border-color:teal;
        box-shadow:0 2px 10px rgba(0,0,0,0.1);

         

       

    }
   
    button{
    padding: 0.6rem;
    background-color: teal;
    font-size: medium;
    border-radius: 2rem;
    color: #f6f3f3;

    

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
                font-family: "TikTok Sans";

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