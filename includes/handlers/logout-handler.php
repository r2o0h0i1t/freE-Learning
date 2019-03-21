<?php
include "../config.php";

// Clear all sessions variables
unset($_SESSION['userLoggedInName']);
unset($_SESSION['userLoggedInId']);

// Go to homepage
header("Location: " . ROOT_URL . "homepage.php");

// Close db connection
mysqli_close($con);