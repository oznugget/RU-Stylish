<?php
session_start();
require_once 'connection.php';

if (isset($_POST['submit'])) {
    $title     = $_POST['title'];
    $size      = $_POST['size'];
    $colour    = $_POST['colour'];
    $price     = $_POST['price'];
    $condition = $_POST['condition'];
    $category  = $_POST['category'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        
        $stmt = $conn->prepare("INSERT INTO `all_listing` (`title`, `size`, `colour`, `price`, `condition`, `category`, `image`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $null = NULL;
        $stmt->bind_param("sssdssb", $title, $size, $colour, $price, $condition, $category, $null);
        $stmt->send_long_data(6, $imageData);

        if($stmt->execute()) {
            $newListingID = $conn->insert_id; 
            $currentUserID = $_SESSION['user_id']; 

            // 1. Insert into the bridge table
            $bridgeStmt = $conn->prepare("INSERT INTO user_listing (ListingID, UserID) VALUES (?, ?)");
            $bridgeStmt->bind_param("ii", $newListingID, $currentUserID);
            $bridgeStmt->execute();
            $bridgeStmt->close(); // Always close your second statement

            // 2. ONLY ONE alert and redirect
            echo "<script>
                    alert('Listing created successfully!');
                    window.location.href = 'index.php'; 
                  </script>";
            
            // 3. Stop the script here
            exit(); 
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>