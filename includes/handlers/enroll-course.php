<?php

include('../config.php');

$userId = $_SESSION['userLoggedInId'];
$courseId = $_POST['enrollBtn'];

$date = date("Y/m/d");

$query = "INSERT INTO enrolled VALUES ('$userId','$courseId','$date')";

$result = mysqli_query($con,$query);
if($result){
    header("Location: ../../dashboard.php");
}else{
    echo "Error inserting to database!";
}