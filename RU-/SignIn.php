<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <style>
        @import url('style.css');
    </style>
    <script src="script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

<?php 
session_start();
require "connection.php"; 

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    // 1. Prepare a statement to fetch the user by username or email
    $stmt = $conn->prepare("SELECT UserID, username, Password, permission FROM user WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_input, $username_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // 2. Verify the password
        if (password_hash($password_input, $user['password'])) {
            // 3. Create Session variables
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['permission'] = $user['permission'];
            $_SESSION['logged_in'] = true;
            
            // Redirect to home page
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No account found with that username or email.";
    }
}
?>
</head>

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
    
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="Create_Acount.php">Create Account</a></li>
                    <li><a href="SignIn.php">Sign in</a></li>
                <?php endif; ?>
    
                <li><a href="CampusMap.php">Map</a></li>
                <li><a href="about.php">About Us</a></li>
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


    <form id="form" action="SignIn.php" method="post">
            <h2 style="color:rgb(33, 116, 103)" id="login-header">Login</h2>

            <?php if ($error_message): ?>
                <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
            <?php endif; ?>

        <section>
            <div class="signin-username">
                <input type="text" placeholder="Username or Email" id="username" name="username" required>
            </div>

              <br>

            <div class="signin-password">
                <input type="password" placeholder="Password" id="password" name="password" style="position:relative;" required>
                <dic class=""></dic><i class="fa fa-eye hide"></i>
                <i class="fa fa-eye-slash hide" ></i>

            </div>


            <br>
              <div>
                <div class="remember">
                    
                   
                    <input type="checkbox">
                    <label>Remember Me </label>
                    <br>
                    

                </div>            
                <button type="submit" class="btn">Login </button>
                
                <div class="register">
                    <p>Dont have an Account yet? <a href="Create_Acount.php">Register Now</a></p>
                    </div>



              </div>
        </section>
    </form>

    <br>

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
<br>

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
                <!--This is a YOUTUBE link for marketing not our personal account-->
                <td> <a href = "https://youtu.be/4ajmfzj9G1g?si=Nml_kssisJcEpLGM"> YouTube </a></td>
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