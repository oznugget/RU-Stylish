<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <style>
        @import url('style.css');
    </style>
    <script src="script.js" defer></script> <!-- defer so it loads html first then js -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <script src="Reviews.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"><link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

    <?php require "connection.php" ?>




<style>

    .B{
    margin:10px;
    padding:10px 20px;
    font-size:16px;
    cursor:pointer;
    

    }


.B:hover {
    background-color: #0f766e;
    transform: translateY(-2px);
    box-shadow: 0px 8px 15px rgba(0,0,0,0.2);
}

.B:active {
    transform: scale(0.96);
}
















  body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        .review-container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: 2px solid black;
        }

        h2 {
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input:focus, textarea:focus {
            border-color: #667eea;
            outline: none;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Simple Star Rating */
        .rating-stars {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 5px;
        }

        .rating-stars input {
            display: none;
        }

        .rating-stars label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
            float: right;
        }

        .rating-stars input:checked ~ label,
        .rating-stars label:hover,
        .rating-stars label:hover ~ label {
            color:   #008080;
        }

        button {
            background: #667eea;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            border: 2px solid black;
        }

        button:hover {
            background: #764ba2;
        }

        .note {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 15px;
        }




        .AllReviews {
        max-width: 600px;
        margin: 20px auto;
        font-family: Arial, sans-serif;
    }
    
    .AllReviews h2 {
        color: #333;
        margin-bottom: 20px;
    }
    
    .review-card {
        background: white;
        border: 2px solid black;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
    }
    
    .user-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        gap: 10px;
    }
    
    .user-icon {
        font-size: 24px;
    }
    
    .username {
        font-weight: bold;
        color: #333;
    }
    
    .review-stars {
        margin-left: auto;
        color:  #008080;
        font-size: 14px;
    }
    
    .comment {
        color: #555;
        margin: 0 0 0 34px;
        line-height: 1.4;
    }


    .icon {
        width: 40px;      
        height: 40px;       
        border-radius: 50%; 
        object-fit: cover;  
        border: 2px solid #008080; 
        margin-right: 10px;
    }

</style>


</head>
<body id = "reviewbody">

    <!-- page for all user reviews -->
    
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
<br><br>
    



<section class="AllReviews">

<h2>Customer Reviews</h2>
    
 
    <div class="review-card">
        <div class="user-header">
            <img class="icon" src="images/DummyIcon.png">
            <span class="username">Sarah Johnson</span>
            <span class="review-stars"> 7/7</span>
        </div>
        <p class="comment">Amazing website! Very easy to use and great selection of items.</p>
    </div>

 
    <div class="review-card">
        <div class="user-header">
              <img class="icon" src="images/DummyIcon.png">
            <span class="username">Mike Smith</span>
            <span class="review-stars"> 6/7</span>
        </div>
        <p class="comment">Good experience overall. Shipping was fast.</p>
    </div>


</section>


      <div class="AdminAttributes">
        <p id="adminp"> This page is for admin use only. </p>

         <a href="admin_overview.php" ><button type="submit" class="B" >Overview</button></a>
         <br>

         <a href="admin_reports.php"><button type="submit" class="B" >Reports</button></a>
        <br>

    
        <a href="admin_store.php" ><button type="submit" class="B">Store</button></a>
    <br>
    </div>








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
    

<script src="Reviews.js" defer></script>
</body>
</html>

