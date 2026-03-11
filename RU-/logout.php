<?php
session_start();
session_unset(); // Clear all session variables
session_destroy(); // Kill the session
header("Location: index.php"); // Send back to home
exit();
?>