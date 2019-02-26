<?php

include('../config.php');

if(isset($_SESSION['userLoggedInName'])){

    $username = $_SESSION['userLoggedInName'];
    $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
    $userId = mysqli_fetch_assoc($result)['id'];
    
    $courseId = $_POST['enrollBtn'];
    
    $date = date("Y/m/d");
    
    $query = "INSERT INTO enrolled VALUES ('$userId','$courseId','$date')";
    
    $result = mysqli_query($con,$query);
    if($result){
        header("Location: ../../dashboard.php");
    }else{
        echo "Error inserting to database!";
    }
}else{
    header("Location: ../../login.php");
}
