<?php
// include database connection file
include_once("config.php");
// Get id from URL to delete that data
$name = $_GET['id'];
// SET is_delete menjadi 1
$result = mysqli_query($db, "UPDATE weapon SET is_delete=1
WHERE name='$name'");
// After delete redirect to Home, so that latest user list will be
header("Location:homepage.php");
?>