<?php 
session_start(); 
require "connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=!, initial-scale=1.0">
    <title>Report Page</title>
    <style>
        @import url('style.css');
    </style>

       <script src="Report.js" defer></script>

    <script src="script.js" defer></script> <!-- defer so it loads html first then js -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">


<?php require "reportValidation.php"?>
    <script src="Reports.js" defer></script>
</head>

<!--report any issues on the page -->
<body onclick = "moving()">


  <header>
        <nav>
            <div class="menu-icon">
                <a href="#" onclick = "showSidebar()"> <img src="images/menuicon.png" alt="Menu Icon" width="30px" height="30px" id="menu-icon"> </a>
            </div>
            
            <div class="logo">
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="75px" height="65px" class="logo-left"></a>
            </div>
            <ul id="nav_elems" class="nav-links">
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
    <br>

    <div id = "bearContainer">
        <img id = "misconductBear" src = "images\bearMisconduct.png"  alt = "bear moving" width = "400" height = "400"/>
    </div>
    

    <section id="report" >
        <h2 style="color:rgb(33, 116, 103)">Report a Misconduct</h2>
        <form  id = "report_form" action="reportValidation.php" method="post">
        <label for="misconduct"><b>Select the type of misconduct:</b></label><br>
        <label>
            <input type="radio" name="misconduct" value="Scam"> Scam
        </label><br>
        <label>
            <input type="radio" name="misconduct" value="Damaged Goods"> Damaged Goods
        </label><br>
        <label>
            <input type="radio" name="misconduct" value="Theft"> Theft
        </label><br>
        <label>
            <input type="radio" name="misconduct" value="Phishing"> Phishing
        </label> 
      


                <br><br>  
            <div>
                <input type="text" placeholder="username of reported user" id="reported_user" name="perp" >
                
            </div>
            <br>
            <div>
                <textarea id = "describe_misconduct" placeholder="    Describe the misconduct experience"  name="description"  ></textarea>
                
            </div>
            <br>
            <button id = "submitMisconduct" type="submit" name="submit" value="Submit"><b>Submit Report</b></button>
        </form>

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