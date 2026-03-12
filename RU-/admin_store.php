<?php 
session_start(); 
require "connection.php";

$searchResults = [];
$searchPerformed = false;

// Check if search was submitted
if (isset($_GET['search']) && !empty($_GET['item'])) {
    $searchTerm = $_GET['item'];
    $searchPerformed = true;
    
    // Prepare search query to look in multiple columns
    $stmt = $conn->prepare("SELECT * FROM all_listing WHERE 
                            Title LIKE ? OR 
                            Price LIKE ? OR 
                            Size LIKE ? OR 
                            Colour LIKE ?");
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("ssss", $likeTerm, $likeTerm, $likeTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
    $stmt->close();
}

// Get all listings for default display
$sql = "SELECT * FROM all_listing";
$allListings = $conn->query($sql);
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        @import url('style.css');
    </style>

    <script src="products.js" defer></script>

     <script src="Reports.js" defer></script>
    <script src="script.js" defer></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

   


<style>


   .AdminAttributes{
        display:grid;
        align-items:center;
        justify-content:center;
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




.Find {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background: white;
    border: 2px solid black;
    border-radius: 8px;
}



.Find form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.Find h2 {
    color: #216074;
    margin: 0;
}

.Find input {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

.Find button {
    padding: 12px 20px;
    background: #008080;
    color: white;
    border: 2px solid black;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
}

.Find button:hover {
    background: #006666;
}

.Find a button {
    background: #666;
}

.Find a button:hover {
    background: #444;
}

.store_items {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-top: 20px;
}

.items {
    background: white;
    border: 2px solid black;
    border-radius: 8px;
    padding: 15px;
    width: 250px;
    transition: transform 0.3s;
}

.items:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.store_img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 4px;
    border: 1px solid #ddd;
}

</style>




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



     <h1 id="adminh2" > All Items </h1>

     <p id="adminp"> View  the all  Items Listed by  users   </p>

 
    <div class="Find">
            <form method="GET" action="">
        <h2>Find Specified Item</h2>
        <input type="text" name="item" placeholder="Search by title, price, size, or colour..." 
               value="<?php echo isset($_GET['item']) ? htmlspecialchars($_GET['item']) : ''; ?>">
        <button type="submit" name="search" value="1">Search</button>
        <?php if (isset($_GET['search'])): ?>
            <a href="admin_store.php"><button type="button">Clear</button></a>
        <?php endif; ?>
    </form>
</div>



<section class="store">
    <h2 style="color:rgb(33, 116, 103)">
        <?php echo $searchPerformed ? 'Search Results' : 'All Listings'; ?>
    </h2>
    
    <?php if ($searchPerformed): ?>
        <p style="margin-bottom: 15px; color: #666;">
            Search results for: <strong>"<?php echo htmlspecialchars($_GET['item']); ?>"</strong> 
            (<?php echo count($searchResults); ?> items found)
        </p>
    <?php endif; ?>
    
    <div class="store_items">
        <?php
        if ($searchPerformed) {
            // Display search results
            if (count($searchResults) > 0) {
                foreach ($searchResults as $row) {
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
                echo "<div style='text-align: center; padding: 40px; background: white; border: 2px solid black; border-radius: 8px;'>
                        <p>No items found matching <strong>'" . htmlspecialchars($_GET['item']) . "'</strong></p>
                        <p style='color: #666; margin-top: 10px;'>Try different keywords or clear the search</p>
                      </div>";
            }
        } else {
            // Display all listings
            if ($allListings->num_rows > 0) {
                while($row = $allListings->fetch_assoc()) {
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
        }
        ?>
    </div>
</section>



<br>

    <div class="AdminAttributes">
        <p id="adminp"> This page is for admin use only. </p>

         <a href="admin_overview.php"><button type="submit">Overview</button></a>
         <br>

         <a href="admin_reports.php"><button type="submit">Reports</button></a>
        <br>

       <a href="admin_reviews.php"><button type="submit">Reviews</button></a>
    <br>
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
<p id="browser"></p> <!-- displays user's browser -->
</footer>
    
</body>
</html>
