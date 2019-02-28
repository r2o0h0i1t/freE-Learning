<?php

include '../config.php';

// Check if user is logged in
if (isset($_SESSION['userLoggedInName'])) {
    
    $username = $_SESSION['userLoggedInName'];

    // Get id of user currently logged in
    $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
    $userId = mysqli_fetch_assoc($result)['id'];

    // Get course id from page
    $courseId = $_POST['enrollBtn'];

    $date = date("Y/m/d");

    // Insert into enrolled table
    $query = "INSERT INTO enrolled VALUES ('$userId','$courseId','$date')";
    $result = mysqli_query($con, $query);

    // Check if insertion was successful
    if ($result) {

        // Close db connection
        mysqli_close($con);

        // Go to dashboard
        header("Location: ../../dashboard.php");
    } else {
        echo "Error inserting to database!";
    }
} else {
    // Go to login page
    header("Location: ../../login.php");
}