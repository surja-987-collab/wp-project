<?php
session_start();
session_destroy(); // Destroy session
header("Location: index.php"); // Redirect to home page
exit();
?>

