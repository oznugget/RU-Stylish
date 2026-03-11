<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=!, initial-scale=1.0">
    <title>Change Passsword</title>

    <style>
        html{
    font-size: 1rem;
    font-family: "TikTok Sans", sans-serif;  
}
    
    body{
        display: flex;
        height:100vh;  
       align-items: center;
        justify-content: center;
        

        background-color:rgb(243, 241, 241);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover; 
        font-family: "TikTok Sans", sans-serif;  


    }


    .chgpasssword{
        font-family:serif;
        display:flex;
         flex-direction:column;
        align-items: center;
        padding: 10 px;
        border-radius: 20px;
        border-style: solid;
        border-color:teal;
        background-image:url("images/nav.png");
        justify-content: center;
        text-align:center;
         width:350px;
         padding-bottom:50px ;
         background-color: white;

          flex-direction:column;
         
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
        font-family: "TikTok Sans", sans-serif;  
    }




        
    </style>




</head>
<body>
<section class="chgpasssword">

    <h1>Change Username</h1>
    <br>
    
    <form action="" method="Post">

    <label for="NewName"> New Username </label>  <br>
    <input type="name" name="Nwname" required>  <br>
  <br>

    <button type="submit">Submit</button>
    </form>




</section>

    
</body>
</html>