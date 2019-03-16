<?php
include('../config.php');

if(isset($_POST["search-value"])){
    $search = $_POST["search-value"];

    $query = "SELECT * FROM course WHERE title LIKE '%$search%'";
    $result = mysqli_query($con,$query);

    $courses = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($courses,$row);
    }

    echo json_encode($courses);
}