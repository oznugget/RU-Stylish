<?php 
session_start(); 
require "connection.php"; 

// Initialize search variable


// Initialize variables
$searchTerm = '';
$searchResults = null;
$selectedCategory = '';

// Check if category was selected
if (isset($_GET['category']) && !empty($_GET['category'])) {
    $selectedCategory = $_GET['category'];
    
    // Prepare category query
    $stmt = $conn->prepare("SELECT * FROM all_listing WHERE category = ? ORDER BY ListingID DESC");
    $stmt->bind_param("s", $selectedCategory);
    $stmt->execute();
    $searchResults = $stmt->get_result();
    $stmt->close();
}
// Check if search was submitted
else if (isset($_GET['search']) && !empty($_GET['query'])) {
    $searchTerm = $_GET['query'];
    
    // Prepare search query
    $stmt = $conn->prepare("SELECT * FROM all_listing WHERE 
                            Title LIKE ? OR 
                            Price LIKE ? OR 
                            Size LIKE ? OR 
                            Colour LIKE ? 
                            ORDER BY ListingID DESC");
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("ssss", $likeTerm, $likeTerm, $likeTerm, $likeTerm);
    $stmt->execute();
    $searchResults = $stmt->get_result();
    $stmt->close();
} else {
    // Get all listings if no search or category
    $sql = "SELECT * FROM all_listing ORDER BY ListingID DESC";
    $searchResults = $conn->query($sql);
}

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
    <script src="script.js" defer></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

   



<style>
.nav-icons {
    display: flex;
    align-items: center;
    gap: 15px;
}


.clear-btn {
    margin-left: 10px;
    color: #008080;
    font-size: 14px;
    text-decoration: none;
}

.clear-btn:hover {
    text-decoration: underline;
}


.search-form {
    background-image: none !important;
    width: auto !important;
    padding: 0 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    margin: 0 !important;
    text-align: left !important;
    display: flex;
    align-items: center;
    gap: 5px;
}


.search-input {
    padding: 8px;
    font-size: 14px;
    border: 2px solid #ddd;
    border-radius: 50px;
    width: 180px;
    outline: none;
    transition: border-color 0.3s ease;
}

.search-input:focus {
    border-color: #008080;
}

.search-btn {
    padding: 8px 12px;
    background-color: #008080;
    border: none;
    border-radius: 50px;
    color: white;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-btn:hover {
    background-color: #0f766e;
}









button {
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
    transform: scale(0.96)
}

.category-form {
    background-image: none !important;
    width: auto !important;
    padding: 0 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    margin: 0 !important;
    text-align: left !important;
}


#tag {
    padding: 10px;
    font-size: 1rem;
    border-radius: 30px;
    border: none;
    color: rgb(24, 83, 73);
    font-weight: bold;
    display: flex;
    margin-left: 1rem;
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
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="95px"
                        height="85px" class="logo-left"></a>
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
                <?php if (isset($_SESSION['permission']) && $_SESSION['permission'] === 'Admin'): ?>
                    <li><a href="Admin.php" style="color: red;">Admin Dashboard</a></li>
                <?php endif; ?>
            </ul>


            <div class="nav-icons">

                       
                        <form method="GET" action="" id="search-form" class="search-form">
                         <input type="text" name="query" placeholder="Search items..." 
                         value="<?php echo htmlspecialchars($searchTerm); ?>" class="search-input">
                        <button type="submit" name="search" value="1" class="search-btn">Search</button>
                        <?php if (isset($_GET['search'])): ?>
                        <a href="index.php" class="clear-btn">Clear</a>
                        <?php endif; ?>
                             </form>
                           <a href="MyAccount.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon"/></a>
                    </div>


  
                                
        </div>

        </nav>
                
    
    </header>
        <br>

    </header>
    <br>





<article class="Category">
    <h2 style="color:rgb(33, 116, 103)">Shop by category</h2>
    <div class="listing-category">
        <form method="GET" action="" id="categoryForm" class="category-form">
            <select name="category" id="tag" onchange="this.form.submit()">
                <option value="">All Categories</option>
                <option value="shirt" <?php echo ($selectedCategory == 'shirt') ? 'selected' : ''; ?>>Shirts</option>
                <option value="dresses" <?php echo ($selectedCategory == 'dresses') ? 'selected' : ''; ?>>Dresses</option>
                <option value="shoes" <?php echo ($selectedCategory == 'shoes') ? 'selected' : ''; ?>>Shoes</option>
                <option value="pants" <?php echo ($selectedCategory == 'pants') ? 'selected' : ''; ?>>Pants</option>
                <option value="hoodie" <?php echo ($selectedCategory == 'hoodie') ? 'selected' : ''; ?>>Hoodies</option>
                <option value="caps_beanies" <?php echo ($selectedCategory == 'caps_beanies') ? 'selected' : ''; ?>>Caps & Beanies</option>
            </select>
            <?php if (!empty($searchTerm)): ?>
                <input type="hidden" name="query" value="<?php echo htmlspecialchars($searchTerm); ?>">
            <?php endif; ?>
        </form>
    </div>
</article>



<div class="line"></div>

<section class="store">
    <h2 style="color:rgb(33, 116, 103)">
        <?php 
        if (!empty($selectedCategory)) {
            $categoryNames = [
                'shirt' => 'Shirts',
                'dresses' => 'Dresses',
                'shoes' => 'Shoes',
                'pants' => 'Pants',
                'hoodie' => 'Hoodies',
                'caps_beanies' => 'Caps & Beanies'
            ];
            echo $categoryNames[$selectedCategory] . ' Category';
        } else if (isset($_GET['search']) && !empty($_GET['query'])) {
            echo 'Search Results for "' . htmlspecialchars($searchTerm) . '"';
        } else {
            echo 'All Listings';
        }
        ?>
    </h2>
    
    <?php if (!empty($selectedCategory)): ?>
        <p style="margin-bottom: 15px; color: #666;">
            Found <?php echo $searchResults->num_rows; ?> item(s) in this category
            <a href="index.php" style="color: #008080; margin-left: 10px;">View All</a>
        </p>
    <?php elseif (isset($_GET['search']) && !empty($_GET['query'])): ?>
        <p style="margin-bottom: 15px; color: #666;">
            Found <?php echo $searchResults->num_rows; ?> item(s)
        </p>
    <?php endif; ?>
    
   
    <div class="store_items">
        <?php
        if ($searchResults && $searchResults->num_rows > 0) {
            while($row = $searchResults->fetch_assoc()) {

                // Convert the binary image data back to a base64 string for display    !!!!!!

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
            echo "<div style='text-align: center; padding: 40px; background: white; border: 2px solid black; border-radius: 8px; width: 100%;'>
                    <p>No items found.</p>";
            if (!empty($selectedCategory)) {
                echo "<p style='color: #666; margin-top: 10px;'>Try another category or <a href='index.php' style='color: #008080;'>view all listings</a></p>";
            } else if (isset($_GET['search']) && !empty($_GET['query'])) {
                echo "<p style='color: #666; margin-top: 10px;'>Try different keywords or <a href='index.php' style='color: #008080;'>view all listings</a></p>";
            }
            echo "</div>";
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
