<?php 
session_start(); 
require "connection.php"; 



$searchResults = [];
$searchPerfomred = false;


//Submision CHeck 
if (isset($_GET['search']) && !empty($_GET['username'])) {
    $searchTerm = trim($_GET['username']);
    $searchPerformed = true;



 // Prepare SQL  to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE username LIKE ?");
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("s", $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();


while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
    $stmt->close();
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

     <script src="Report.js" defer></script>
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

        /*  Star Rating */
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



    .Find {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background: white;
    border: 2px solid black;
    border-radius: 8px;
}

.Find input {
    width: 100%;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 4px;
    margin: 10px 0;
    box-sizing: border-box;
}

.Find button {
    padding: 10px 20px;
    background: #008080;
    color: white;
    border: 2px solid black;
    border-radius: 4px;
    cursor: pointer;
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
                <li><a href="admin.php">Admin</a></li>
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

    </header>
    <br>



     <h1 id="adminh2" > Reports </h1>

     <p id="adminp"> View  the   Reports submitted by users   </p>

 
    <div class="Find">
   
        <form method="GET" action="">
             <h2> Find Reported User</h2>
          <input type="text" name="username" placeholder="Enter Username"
value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>">
            
            <button type="submit" name="search" value="1">Search</button>
                    <br>
             <?php if (isset($_GET['search'])): ?>
            
        <?php endif; ?>

        </form>

    </div>




<!-- SEARCH RESULTS SECTION - APPEARS ONLY WHEN SEARCH HAS been done-->

<?php if (isset($_GET['search'])): ?>
    <section class="SearchResults">
      <h2>Search Results for "<?php echo (isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''); ?>"</h2>
        
        <?php if (count($searchResults) > 0): ?>
            <p>Found <?php echo count($searchResults); ?> user(s)</p>
            
            <?php foreach ($searchResults as $user): ?>
                <div class="review-card">
                    <div class="user-header">
                        <img class="icon" src="images/DummyIcon.png" alt="User">
                        <span class="username"><?php echo htmlspecialchars($user['username']); ?></span>
                     
                    </div>
                    <div style="margin-left: 50px;">
                        <p class="comment"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                        
                    </div>
                </div>
            <?php endforeach; ?>
            
        <?php else: ?>
            <div class="review-card" style="text-align: center; padding: 30px;">
               <p>No users found matching "<?php echo (isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''); ?>"</p>
            </div>
        <?php endif; ?>
    </section>
    <br>
<?php endif; ?>
 
 









 
     <section class="AllReports">
        <h1>All Recent Reported Cases</h1>


     </section>


     
    <div class="AdminAttributes">
 
         <a href="admin_overview.php"><button type="submit">Overview</button></a>
         <br>

   

       <a href="admin_reviews.php"><button type="submit">Reviews</button></a>
    <br>
        <a href="admin_store.php" ><button type="submit">Store</button></a>
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
