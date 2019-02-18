<?php

include("../config.php");
include("../classes/Course.php");
include("../classes/Constants.php");

$course = new Course($con);

// Remove html tags
$title = strip_tags($_POST['title']);
$category = strip_tags($_POST['category']);
$teaser = strip_tags($_POST['teaser']);
$benefit = strip_tags($_POST['benefit']);
$requirements = strip_tags($_POST['requirements']);
$description = strip_tags($_POST['description']);
$target = strip_tags($_POST['target']);

$videos = $_FILES['videos'];

$numOfVideos = count($videos['name']);

if ($course->validateAll($title,$videos) == true){
    // valid title & videos

    if($course->insertDb($title,$category,$teaser,$benefit,$requirements,$description,$target,$numOfVideos) == true){
        // insertion to db success
        echo json_encode("success");
    }else{
        $errorArray = $course->getErrors();
        array_push($errorArray, "Error inserting data into database!");
        echo json_encode($errorArray);
    }
}else{
    echo json_encode($course->getErrors());
}
