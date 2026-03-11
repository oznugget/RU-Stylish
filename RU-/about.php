<?php 
session_start(); 
require "connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- for linkedin icon-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

    <title>About RU Stylish</title>
    <style>
        @import url('style.css');
    </style>
    <script src="script.js" defer></script> <!-- defer so it loads html first then js -->
</head>
<body>

    <!-- About page for the crew -->

    <header>
        <nav>
            <div class="menu-icon">
                <a href="#" onclick = "showSidebar()"> <img src="images/menuicon.png" alt="Menu Icon" width="30px" height="30px" id="menu-icon"> </a>
            </div>
            
            <div class="logo">
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="75px" height="65px" class="logo-left"></a>
            </div>
            <ul class="nav-links">
                <li><a href=# onclick="closeSidebar()"><img src="images/closeIcon.png" alt="Close Icon" width="30px" height="30px"></a></li>
               <li><a href="index.php">Home</a></li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="listing.php">Create Listing</a></li>
                <?php else: ?>
                    <li><a href="Create_Acount.php">Create Account</a></li>
                    <li><a href="SignIn.php">Sign in</a></li>
                <?php endif; ?>
                <li><a href="CampusMap.php">Map</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="review.php">Reviews</a></li>
                <li><a href="report.php">Report</a></li>
            </ul>

            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
            <div class="nav-icons">
            <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="MyAccount.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon"/></a>
                <?php else: ?>
                    <a href="SignIn.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon"/></a>
            <?php endif; ?>
    
        </div>

        </nav>
         
    </header>

    <div class="line"></div>

    <section class = "siteDetails">
    <img id = "aboutRUlogo" src="images/rustylishlogo.png" height="10%" width="10%">
    <h2 id = "aboutSiteh2" style="color:rgb(33, 116, 103)"></h2>
    <p id = "aboutSite" >RU Stylish is a platform for everyone involved in the Rhodes University community to buy and sell second-hand clothing and accessories. <br>
        We are a student-run marketplace that promotes sustainability and community engagement.
        You as our customer, can create a listing of item you would like to sell. You can also view more details about each listing by clicking on the 
        item that you see. You can also create a wishlist as a collection of things you like, then put in a bid when you are ready.<br>
        Click <a href = "SignIn.php"> here </a>to sign up for an account, press releases, and updates from our website.
        This website was designed to put you, our customer, first in all services because you matter.<br> 
        Need any assistance marketing, pricing or choosing what to sell? <br>
        <!--This is a YOUTUBE link for marketing-->
        <a href="https://youtu.be/4ajmfzj9G1g?si=Nml_kssisJcEpLGM" target="_blank"> 
        Click</a> on this link and visit the YouTube page for a proper insight into the business. <br> In the event of any misconduct
        , <a href="report.php">report it here </a> and we will investigate it. Thank you for visiting us. Stick around for a purchase or a listing.</p>
        
    </section>

    <section class="About">
        <h3 id = "storyh3" style="color:rgb(33, 116, 103)"> The Origins and Story of CHOCA-cara-nilla</h3>
        <p id = "aboutSite"> The team was formed by an unlikely combination of different individuals from different backgrounds. The team was formed in 
            2024 and has been working together for the past 2 years. The team is now focused on developing multiple projects that are recognised and 
            modern. 
            
        </p>
    </section>
    

    
    <div class="line"></div>

<section class="About">
     <h2 id = "aboutSiteh2" style="color:rgb(33, 116, 103)">Tutorial</h2>
    <video class="hero-video" width="1600" height="300" controls autoplay muted loop playsinline>
    <source src="videos/webvid.mp4" type="video/mp4">
    <source src="movie.webm" type="video/webm">
    Your browser does not support the video tag.
    </video>

    </section>


    <div class="line"></div>

    <h2 id = "teamMembers" style="color:rgb(33, 116, 103)">CHOCA-Cara-Nilla Team Members</h2> 
    <section id="members">
        
            <div id = "Shumi" class = "m">
                <img class="member_imgs" src="images/Shumi.JPG" alt="Shumirai" width="220px" height="150px">
                <h4 style="color:rgb(33, 116, 103)">Shumirai</h4>
                <p><b>Position:</b></p>
                <p>Project Manager</p>
                <a href="https://www.instagram.com/ru_stylish/"><img class= "iglogo"src = "images/instagram_logo-removebg-preview.png"/></a>
                <a href ="https://www.linkedin.com/in/shumirai-gunzo-312071240/"><img class= "linklogo"src = "images/linkedin_logo-removebg-preview.png"/></a>
            </div>

            <div id = "Chris" class = "m">
                <img class="member_imgs" src="images/chrisphoto.jpeg" alt="Christopher" width="200px" height="150px">
                <h4 style="color:rgb(33, 116, 103)">Christopher</h4>
                <p><b>Position:</b></p>
                <p>Back-end developer</p>
                <a href="https://www.instagram.com/ru_stylish/"><img class= "iglogo"src = "images/instagram_logo-removebg-preview.png"/></a>
                <a href ="https://www.linkedin.com/in/christopher-pretorius-32ba58321/"><img class= "linklogo"src = "images/linkedin_logo-removebg-preview.png"/></a>
            </div>

            <div id = "Kovhi" class = "m">
                <img class="member_imgs" src="images/Kovhi.jpeg" alt="Kovhi" width="200px" height="150px">
                <h4 style="color:rgb(33, 116, 103)">Ntsumbedzeni</h4>
                <p><b>Position:</b></p>
                <p>Lead developer </p>
                <a href="https://www.instagram.com/ru_stylish/"><img class= "iglogo"src = "images/instagram_logo-removebg-preview.png"/></a> 
                <a href = "https://pin.it/H7zjuNKgH"><img src = "images\pinterestIcon.jpg" width = "50px" height = "50px"/></a>
            </div>

            <div id = "Pranay" class = "m">
                <img class="member_imgs" src="images/pranay.JPG" alt="Pranay" width="220px" height="150px">
                <h4 style="color:rgb(33, 116, 103)">Pranay</h4>
                <p><b>Position:</b></p>
                <p>Front-end developer</p>
                <a href="https://www.instagram.com/ru_stylish/"><img class= "iglogo"src = "images/instagram_logo-removebg-preview.png"/></a>
                <a href = "https://www.linkedin.com/in/pranay-patel-a200653b2/"><img class= "linklogo"src = "images/linkedin_logo-removebg-preview.png"/></a>
            </div>

            <div id = "Abona" class = "m">
                <img class="member_imgs" src="images/RU-imagesAbonaphoto.png" alt="Abona" width="150px" height="150px">
                <h4 style="color:rgb(33, 116, 103)">Abona</h4>
                <p><b>Position:</b></p>
                <p>Database Analyst</p>
                <a href="https://www.instagram.com/ru_stylish/"><img class= "iglogo"src = "images/instagram_logo-removebg-preview.png"/></a>
                <a href="https://www.linkedin.com/in/abona-3570653b2/"><img class= "linklogo"src = "images/linkedin_logo-removebg-preview.png"/></a>
            </div>
        
    </section>
    </div>


    </section>
</section>


    <div class="line"></div>



</body>

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
    
 