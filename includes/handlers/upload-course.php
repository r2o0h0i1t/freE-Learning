<?php

require "includes/config.php";
require "includes/classes/Course.php";
require "includes/classes/Constants.php";
require "includes/classes/Messages.php";

$course = new Course($con);

// Remove html tags
$title = strip_tags($_POST['title']);
$category = strip_tags($_POST['category']);
$teaser = strip_tags($_POST['teaser']);
$benefit = strip_tags($_POST['benefit']);
$requirements = strip_tags($_POST['requirements']);
$description = strip_tags($_POST['description']);
$target = strip_tags($_POST['target']);

// Uploaded files
$videos = $_FILES['videos'];
$image = $_FILES['image'];

// Get num of videos uploaded
$numOfVideos = count($videos['name']);

if ($course->validateAll($title, $videos, $image) == true) {

    if ($course->insertCourseToDatabase($title, $category, $teaser, $benefit, $requirements, $description, $target, $numOfVideos) == true) {

        if ($course->insertVideoTitlesToDatabase($title, $videos) == true) {

            // move videos to server
            $course->moveVideos($videos, $title);

            // move img to server
            $course->moveImage($image, $title);

            // Success msg
            echo json_encode("success");

        } else {

            echo json_encode("Error inserting videos data into database!");
        }

    } else {
        echo json_encode("Error inserting data into database!");
    }
} else {
    $errors = '';

    // Get all errors
    foreach ($course->getErrors() as $error) {
        $errors = $errors . $error . "</br>";
    }
    echo json_encode($msg);
}

mysqli_close($con);