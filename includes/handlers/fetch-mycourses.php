<?php
    include("../config.php"); 

    $userId = $_SESSION['userLoggedInId'];

    // Get all courses of current user
    $courseQuery = "SELECT * FROM enrolled WHERE userId = '$userId'";
    $result = mysqli_query($con,$courseQuery);

    if(mysqli_num_rows($result) == 0){
        echo json_encode("Congratulations for registering! Now Enroll in a course");
    }else {
        $courses = array();
        while($row = mysqli_fetch_assoc($result)){

            // Get course id
            $courseId = $row['courseId'];

            // Get course details
            $result2 = mysqli_query($con, "SELECT * FROM course WHERE id = '$courseId'");
            array_push($courses,mysqli_fetch_assoc($result2));
        }
        echo json_encode($courses);
    }