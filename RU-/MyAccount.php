<?php 
session_start(); 
require "connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account page</title>
    <style>
        @import url('style.css');
    </style>
    
    <script src="script.js" defer></script> <!-- defer so it loads html first then js -->
    <script src="products.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">


</head>


<body>

    <header>
        <nav>
            <div class="menu-icon">
                <a href="#" onclick = "showSidebar()"> <img src="images/menuicon.png" alt="Menu Icon" width="30px" height="30px" id="menu-icon"> </a>
            </div>
            
            <div class="logo">
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="75px" height="65px"width="75px" height="65px" class="logo-left"></a>
            </div>
            <ul class="nav-links">
                <li><a href=# onclick="closeSidebar()"><img src="images/closeIcon.png" alt="Close Icon" width="30px" height="30px"></a></li>
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

           
         <div class="nav-icons">
    <a href="MyAccount.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon"/></a>
    </div>

        </nav>
    </header>
        <br>



<h2 style="color:rgb(33, 116, 103)">My Listings</h2>

<h2 style="color:rgb(33, 116, 103); margin-top: 40px;">Your Listings Preview</h2>
    
<section  class="store">

<?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $delsql = "DELETE FROM all_listing WHERE ListingID = ?";
            $stmt = $conn->prepare($delsql);
            $stmt->bind_param("i", $_POST['listing_id']);
            $stmt->execute();
        }

        if (!isset($_SESSION['user_id'])) {
            echo "<p>Please log in to see your listings.</p>";
        } else {
            $userId = $_SESSION['user_id'];

            $sql = "SELECT all_listing.* FROM all_listing 
                    JOIN user_listing ON all_listing.ListingID = user_listing.ListingID 
                    WHERE user_listing.UserID = ?";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Convert the binary image data back to a base64 string
                    $imageData = base64_encode($row['Image']);
                    $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                    
?>
                    <div class="view-details" style="border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
                        <img src="<?php echo $imageSrc; ?>" alt="<?php echo htmlspecialchars($row['Title']); ?>" width="200px" height="200px" style="border-radius: 8px;">
                        
                        <h5><?php echo htmlspecialchars($row['Title'] ?? 'Untitled'); ?></h5>
                        <p class="price" style="font-size: 1em; color: rgb(33, 116, 103); font-weight: bold;">
                            R<?php echo htmlspecialchars($row['Price'] ?? '0.00'); ?>
                        </p>
                        <hr>
                        <p><strong>Size:</strong> <?php echo htmlspecialchars($row['Size'] ?? 'N/A'); ?></p>
                        <p><strong>Colour:</strong> <?php echo htmlspecialchars($row['Colour'] ?? 'N/A'); ?></p>
                        <p><strong>Condition:</strong> <?php echo htmlspecialchars($row['Condition'] ?? 'N/A'); ?></p>
                        <p><strong>Category:</strong> <?php echo htmlspecialchars($row['Category'] ?? 'N/A'); ?></p>
                        
                        <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this listing permanently?');" style="margin-top: 15px;">
                            <input type="hidden" name="listing_id" value="<?php echo $row['ListingID']; ?>">
                            <button type="submit" class="del-btn" style="background-color: #ff4d4d; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; width: 100%;">Delete</button>
                        </form>
                    </div>
<?php
                }
            } else {
                echo "<p>You haven't created any listings yet.</p>";
            } 
        }
?>






    </main>        
          
        </div>

    <div class="AccSetting" >
        <h2 id = "Acch2"  style="color:teal"> Settings  : </h2>

        <ul>

        <a href="logout.php"><li class = "AccSet"> Logout</li><a>
        <a href="ChangePassword.php"><li class = "AccSet"> Change Password </li></a>
         <a href="DeleteAcc.php"><li class = "AccSet"> Delete Account </li></a>
         <a href="Terms.php"><li class = "AccSet"> Terms & Conditions </li></a>
        </ul>

    </div>



<footer style = "background-color:#047575; color:rgb(212, 212, 212)">

    
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