<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

require_once 'connection.php';

if (isset($_POST['submit'])) {

    echo "Form submitted successfully!";

    $title = $_POST['title'];
    $size = $_POST['size'];
    $colour = $_POST['colour'];
    $price = $_POST['price'];
    $condition = $_POST['condition'];
    $category = $_POST['category'];

    // Check if file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($image);
    } else {
        die("Error: Please select an image to upload.");
    }

    // Handle file upload
    $image = $_FILES['image']['tmp_name'];
    $imageData = file_get_contents($image);

    $stmt = $conn->prepare("INSERT INTO all_listing (`title`, `size`, `colour`, `price`, `condition`, `category`, `image`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdssb", $title, $size, $colour, $price, $condition, $category, $imageData);

    if($stmt->execute()) {
        echo "Listing created successfully!";
    } else {
        echo "Upload failed";
    }

    $stmt->close();
}

$conn->close();
?>