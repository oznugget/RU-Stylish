<?php 
session_start(); 
require "connection.php"; 
?>
<?php


$status = ""; // Initialize status variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["Username"]); //trim white space
    $email = trim($_POST["Email"]); //trim white space)
    $password = $_POST["Password"];
    $confirmPassword = $_POST["CPassword"];
    $usertype = 'User'; // Default user type

    //prepared statements to prevent sql injection
    $smt = $conn->prepare("SELECT * FROM user WHERE username=? OR email=?");
    $smt->bind_param("ss", $username, $email);
    $smt->execute();
    $result = $smt->get_result(); //get resukt object

    // Validate input
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $status = "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        $status = "Passwords do not match.";
    } else {


        if ($result->num_rows > 0) {
            $status = "Username or email already exists.";
        } else {
            // Insert new user into database after hashing password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = $conn->prepare("INSERT INTO user (username, email, password, permission) VALUES (?, ?, ?, ?)");
            $insertQuery->bind_param("ssss", $username, $email, $hashedPassword, $usertype); // Default permission set to 'user'
            if ($insertQuery->execute()) {
                $status = "Account created successfully!";
                echo 
                header("Location: SignIn.php");  // Redirect to sign-in page after successful account creation
            } else {
                $status = "Error: " . $conn->error;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="google-site-verification" content="YOUR_UNIQUE_VERIFICATION_CODE_HERE" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <title>Create Account Page</title>
    <style>
        @import url('style.css');
    </style>
    <script src="script.js" defer></script> <!-- defer so it loads html first then js -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

   
</head>

<body>


    <!-- page for creating an account -->

    <header>
        <nav>
            <div class="menu-icon">
                <a href="#" onclick = "showSidebar()"> <img src="images/menuicon.png" alt="Menu Icon" width="30px" height="30px" id="menu-icon"> </a>
            </div>
            
            <div class="logo">
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="85px" height="75px" class="logo-left"></a>
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
                <li><a href="Contact.php">Contact us</a></li>
                <li><a href="review.php">Reviews</a></li>
                <li><a href="report.php">Report</a></li>
                <li><a href="Dummy.php">Dummy Page</a></li>
            </ul>

            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>

            
       <div class="nav-icons">
    <a href="MyAccount.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon"/></a>
    </div>

        </nav>
    </header>

    <form autocomplete="off" id="form" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >
        <h2 style="color:rgb(33, 116, 103)">Create Account</h2>
        
        <p id="Err-Messages"><?php echo htmlspecialchars($status); ?></p> <!--status msg from PHP -->


        <div class="createacc-firstname">
            <input type="text" placeholder="Username" id="username" name="Username" required>
        </div>
        <br>

        <div class="email">
            <input type="email" placeholder="Email" id="email" name="Email" required>
        </div>
        <br>

        <div class="createacc-password">
            <input type="Password" placeholder="Password" id="Password" name="Password" required>
        </div>
        <br>

            <div class="createacc-cpassword">
        <input type="Password" placeholder="Confirm password" id="Cpassword" name="CPassword" required>
        </div>
        <br>

        <button type="submit" class="btn">Create Account</button>
        <p class="already" >Already have an Account<a href="SignIn.php"> Sign In</a></p>


    </form>

    <div class="slideshow-container">

  
  <div class="mySlides">
    <div class="numbertext">1 / 3</div>
    <img src="images/slide1.png" style="width:100%">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 3</div>
    <img src="images/slide2.png" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

   <div class="mySlides">
    <div class="numbertext">3 / 3</div>
    <img src="images/slide3.png" style="width:100%">
    <div class="text">Caption Three</div>
  </div>


 
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
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
    

<script src="slideshow.js"></script>
</body>
</html>