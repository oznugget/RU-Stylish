<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        @import url('style.css');
    </style>
    <script src="script.js" defer></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

   
<?php require "connection.php" ?>
</head>

<!-- Home Page. navigation bar with absolute and relative links -->
<body>


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
                <li><a href="admin.php">Admin</a></li>
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
        <br>

    </header>
    <br>

   <!-- creative feature- drop down menu-->
<article class="Category">

        
        <h2 style="color:rgb(33, 116, 103)">Shop by category</h2>
        <div class="listing-category">
            <select name="tag" id="tag" placeholder="category">
            <option value="shirt">Shirts</option>
            <option value="dresses">Dresses</option>
            <option value="shoes">Shoes</option>
            <option value="pants">Pants</option>
            <option value="hoodie">Hoodies</option>
            <option value="caps_beanies">Caps & Beanies</option>
        </div>
        </select>
        

    </article>



<div class="line"></div>





<section  class="store">
<h2 style="color:rgb(33, 116, 103)">All Listings</h2>   
<div class="store_items">
        <?php
        // Fetch all listings from the database
        $sql = "SELECT * FROM all_listing";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Convert the binary image data back to a base64 string for display
                $imageData = base64_encode($row['Image']);
                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                
                echo '<div class="items">
                        <div id="picture">
                            <a href="view_listing.php?id=' . $row['ListingID'] . '" class="listing-link">
                                <img src="' . $imageSrc . '" alt="' . htmlspecialchars($row['Title']) . '" width="200px" height="200px" class="store_img">
                            </a>
                            <figcaption>
                                <p><strong>' . htmlspecialchars($row['Title']) . '</strong></p>
                                <p>R' . htmlspecialchars($row['Price']) . '</p>
                                <p>Size: ' . htmlspecialchars($row['Size']) . ' | Colour: ' . htmlspecialchars($row['Colour']) . '</p>
                            </figcaption>
                        </div>
                      </div>';
            }
        } else {
            echo "<p>No listings found.</p>";
        }
        ?>
    </div>

                
</section>






<br>
<br>
<div class="line"></div>





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
<p id="browser"></p> <!-- displays user's browser -->
</footer>
    
</body>
</html>
