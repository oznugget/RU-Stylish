<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Listing</title>
    <style>
        @import url('style.css');
    </style>
    <script src="script.js" defer></script> <!-- defer so it loads html first then js -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">





    <style>

        body{

        padding:50px;

        }

     .product{
    color:black;
    background-color: white;
    text-align: center;
    align-items: center;
    padding:20px;
    border-color:black;
    gap: 5%;
    border-radius: 10%;       
    background-image: url("images/card_bg.png");
    text-align: center; 
    box-shadow: 5px 5px 8px rgba(0, 0, 0, 0.2); 
    transition: opacity 0.5s ease;
    z-index: 0;
    width:300px;
            border-style: double;
        }


    .ProdDetails{
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

        .ContactSeller{
        display: flex;
        grid-template-columns: 1fr 1fr;
        gap:10px


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

.head{
    padding-bottom: 50px;
    padding-top: 40px;
    color:teal;

}

.footer{
    padding-top: 40px;
}


         
        </style>

<?php require "connection.php" ?>
</head>
<body>
    
   <header>
        <nav>
            <div class="menu-icon">
                <a href="#" onclick = "showSidebar()"> <img src="images/menuicon.png" alt="Menu Icon" width="30px" height="30px" id="menu-icon"> </a>
            </div>
            
            <div class="logo">
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="85px" height="75px" class="logo-left"></a>
            </div>
            <ul class="nav-links">
                <li><a href=# onclick="closeSidebar()"><img src="images/closeIcon.png" alt="Close Icon" width="30px" height="30px"></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="listing.php">Create Listing</a></li>
                <li><a href="Create_Acount.php">Create Account</a></li>
                <li><a href="SignIn.php">Sign in</a></li>
                <li><a href="CampusMap.php">Map</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="Contact.php">Contact us</a></li>
                <li><a href="review.php">Reviews</a></li>
                <li><a href="report.php">Report</a></li>
                <li><a href="Dummy.php">Dummy Page</a></li>
            </ul>

            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>

           
        </nav>
        <div class="nav-icons">
    <a href="MyAccount.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon"/></a>
    <a href="wishlist.php"><img src="images/wishlist_heart.png" width="50px" height="40px" id="WishIcon"/></a>
    </div>
    </header>



    <div class="head">
    <h1>Get in Contact</h1>
    <div>

    <section class="ContactSeller">


        <div class="product">
            <img src="pic.php" >
            </div>

        <div class="ProdDetails">
        <h5 class="location"> Adamson House</h5>

        <figcaption class="prodinfo">
        <p><strong>Item:</strong> Flower printed dress</p>
        <p><strong>Size:</strong> M</p>
        <p><strong>Colour:</strong> Blue</p>
        <p><strong>Condition:</strong> Good</p>
        <p><strong>Seller:</strong> Username</p>
         <p><strong>Price:</strong> Price</p>

            </figcaption>


        <div class="contact">
        <p><strong>Username:</strong> seller123</p>
        <p><strong>Email:</strong> seller@email.com</p>
        <button class="contact-btn">Contact Seller</button>
        </div>

        </div>

    </section>



    
<footer style = "color:rgb(212, 212, 212)">

    
    <div id = "footerLeft">
        <h3> RU Stylish </h3>
        <p> RU stylish? Add items to your wishlist.</p>
        <a href = "index.php"> read more &#x2192 </a>
        <br>
        <p id = "footerBottom">2026 &copy:RUStylish.com</p>
        <p id = "lastModified"></p>
    </div> 

    <div>
        <table id = "footerMiddle">
            <tr>
            <th> Purchasing </th> <th> About </th> <th> Social</th>
            </tr>

            <tr>
                <td> <a href = "index.php">Buy</a></td>
                <td> <a href = "about.php#aboutSite"> Website </a></td>
                <td> <a href = "https://www.instagram.com/ru_stylish/">Instagram</a></li></td>
            </tr>

            <tr>
                <td> <a href = "listing.php"> Sell </a></td>
                <td> <a href = "about.php#aboutCrew"> Crew </a></td>
                <td> <a href = "#"> Youtube </a></td>
            </tr>      
        </table>
    </div>
    

    <div>
        <a id = "footerMap" href="CampusMap.php"> <img src="images/mapicon.png" height = "150px" width="150px" > </a>
    </div>

    <div id = "footerRight">
        <p> Rhodes University <br>
            Makhanda<br>
            Gramahstown <br>
            6139 <br>
            Eastern Cape <br>
            South-Africa <br>
        </p> 


        <p> &#x260F 0789011234 <br>
        &#x2709 Tshikovhi@gmail.com <br>
        </p>
    </div>

</footer>

</body>

</html>