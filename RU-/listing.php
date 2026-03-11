<?php 
session_start(); 
require "connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <style>
        @import url('style.css');
    </style>
    <script src="script.js" defer></script>

    <script src="products.js" defer></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap"
        rel="stylesheet">

</head>


<body>
    <!-- navigation bar with absolute and relative links -->
    <header>
        <nav>
            <div class="menu-icon">
                <a href="#" onclick="showSidebar()"> <img src="images/menuicon.png" alt="Menu Icon" width="30px"
                        height="30px" id="menu-icon"> </a>
            </div>

            <div class="logo">
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="85px"
                        height="75px" class="logo-left"></a>
            </div>
            <ul class="nav-links">
                <li><a href=# onclick="closeSidebar()"><img src="images/closeIcon.png" alt="Close Icon" width="30px"
                            height="30px"></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="listing.php">Create Listing</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
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


        </nav>
        <div class="nav-icons">
            <a href="MyAccount.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon" /></a>
            <a href="wishlist.php"><img src="images/wishlist_heart.png" width="50px" height="40px" id="WishIcon" /></a>
        </div>
    </header>

    <h2 style="color:rgb(33, 116, 103)"> New Listing </h2>
    <br>

    <!-- form to create post -->
    <div id="listingpg">
        <img src="images/listingbear.png" width="400px" height="400px" id="listingImage" alt="Listing Image">
    <form class="listing-form" action="upload.php" method="POST" enctype="multipart/form-data">

        <div class="addImageBtn">
            <input type="file" name="image" id="imageUpload" accept="image/*" style="display: none;">
            <button id = "uploadIcon" type="button" onclick="document.getElementById('imageUpload').click()">
                <img  src="images/uploadIcon.png" width="50px" height="50px">
            </button>


            <span id="imageName">No file chosen</span>
        </div>

        <label for="title"> <b>Title</b></label><br>
        <div class="listing-title">
            <input type="text" id="title" name="title"><br>
        </div>
        <br>

        <label for="size"> <b>Size</b> </label><br>
        <div class="listing-size">
            <input type="text" id="size" name="size">
        </div>
        <br>

        <label for="colour"> <b>Colour(s)</b> </label><br>
        <div class="listing-colour">
            <input type="text" id="colour" name="colour">
        </div>
        <br>

        <!-- creative feature- drop down menus -->



        <label for="price"> <b>Price (R)</b> </label><br>
        <div class="listing-price">
            <input type="number" id="price" name="price" min="0" step="0.01">
        </div>
        <br>

        <label for="condition"><b>Choose a condition</b></label>
        <br>

        <div class="listing-condition">
            <select name="condition" id="condition">
                <option value="new">New</option>
                <option value="excellent">Excellent</option>
                <option value="good">Good</option>
                <option value="fair">Fair</option>
            </select>
        </div>
        <br>
        <br>


        <label for="lcategory"><b>Choose a category</b></label>
        <br>
        <div class="listing-category">
            <select name="category" id="lcategory">
                <option value="shirt">Shirts</option>
                <option value="dresses">Dresses</option>
                <option value="shoes">Shoes</option>
                <option value="pants">Pants</option>
                <option value="hoodie">Hoodies</option>
                <option value="caps_beanies">Caps & Beanies</option>
            </select>
        </div>

        <br>
        <br>

        <div class="postBtn">
            <button type="submit" name="submit">Post</button>
        </div>

    </form>


    
    </div>


    
    <div class="store">

    </div>



    <footer style="color:rgb(212, 212, 212)">


        <div id="footerLeft">
            <h3> RU Stylish </h3>
            <p> RU stylish? Add items to your wishlist.</p>
            <a href="index.php"> read more &#x2192 </a>
            <br>
            <p id="footerBottom">2026 &copy:RUStylish.com</p>
            <p id="lastModified"></p>
        </div>

        <div>
            <table id="footerMiddle">
                <tr>
                    <th> Purchasing </th>
                    <th> About </th>
                    <th> Social</th>
                </tr>

                <tr>
                    <td> <a href="index.php">Buy</a></td>
                    <td> <a href="about.php#aboutSite"> Website </a></td>
                    <td> <a href="https://www.instagram.com/ru_stylish/">Instagram</a></td>
                </tr>

                <tr>
                    <td> <a href="listing.php"> Sell </a></td>
                    <td> <a href="about.php#aboutCrew"> Crew </a></td>
                    <td> <a href="#"> Youtube </a></td>
                </tr>
            </table>
        </div>


        <div>
            <a id="footerMap" href="CampusMap.php"> <img src="images/mapicon.png" height="150px" width="150px"> </a>
        </div>

        <div id="footerRight">
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