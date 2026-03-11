<?php
require "connection.php";

// 1. ALWAYS place the logic at the top so variables are ready for the HTML below
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$item = null;
$imageSrc = 'images/placeholder.jpg'; // Default placeholder

if ($id > 0) {
    // Note: Ensure your table name is 'all_listing' or 'listings' based on your previous fixes
    $stmt = $conn->prepare("SELECT * FROM all_listing WHERE ListingID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if ($item) {
        // Convert image for display - use null coalescing ?? to avoid deprecated warnings
        $rawImage = $item['image'] ?? $item['Image'] ?? null;
        if ($rawImage) {
            $imageSrc = 'data:image/jpeg;base64,' . base64_encode($rawImage);
        }
    } else {
        die("Item not found in the database.");
    }
} else {
    die("Invalid Item ID provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('style.css');
    </style>
    <script src="script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">
    <title><?php echo htmlspecialchars($item['title'] ?? 'Listing Details'); ?></title>
</head>

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

<div class="view-container">
        <div class="view-image">
            <img src="<?php echo $imageSrc; ?>" width="300" alt="Product Image">
        </div>
        
        <div class="view-details">
            <h1><?php echo htmlspecialchars($item['title'] ?? $item['Title'] ?? 'Untitled'); ?></h1>
            <p class="price">R<?php echo htmlspecialchars($item['price'] ?? $item['Price'] ?? '0.00'); ?></p>
            <hr>
            <p><strong>Size:</strong> <?php echo htmlspecialchars($item['size'] ?? $item['Size'] ?? 'N/A'); ?></p>
            <p><strong>Colour:</strong> <?php echo htmlspecialchars($item['colour'] ?? $item['Colour'] ?? 'N/A'); ?></p>
            <p><strong>Condition:</strong> <?php echo htmlspecialchars($item['condition'] ?? $item['Condition'] ?? 'N/A'); ?></p>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($item['category'] ?? $item['Category'] ?? 'N/A'); ?></p>
            
            <button class="buy-btn">Contact Seller</button>
            <br><br>
        </div>
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



</html>