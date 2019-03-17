<?php

include("../config.php");
include("../classes/Course.php");
include("../classes/Constants.php");

    $course = new Course($con);
    
    // Remove html tags from inputs
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

    // Validate title, videos, image
    if ($course->validateAll($title,$videos,$image) == true){
        
        // Check if insertion to db success
        if($course->insertDb($title,$category,$teaser,$benefit,$requirements,$description,$target,$numOfVideos) == true){

            // Check if video titles inserted into videos table
            if($course->insertVideos($title,$videos) == true){
                
                // move videos to server
                $course->moveVideos($videos,$title);
                
                // move img to server
                $course->moveImage($image,$title);
                
                // Success msg
               echo json_encode("success");
                
            }else{

               echo json_encode("Error inserting videos data into database!");
            }
            
        }else{
           echo json_encode("Error inserting data into database!");
        }
    }else{
        // tmp variable: store all errors
        $msg = '';

        // Get all messages from error array
        foreach ($course->getErrors() as $error) {
            $msg= $msg . $error."</br>";
        }
       echo json_encode($msg);
    }