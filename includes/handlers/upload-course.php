<?php

include("includes/config.php");
include("includes/classes/Course.php");
include("includes/classes/Constants.php");
include("includes/classes/Messages.php");

if(isset($_POST['submit'])){
    
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
    $image = $_FILES['image'];

    $numOfVideos = count($videos['name']);

    if ($course->validateAll($title,$videos,$image) == true){
        // valid title & videos
        
        if($course->insertDb($title,$category,$teaser,$benefit,$requirements,$description,$target,$numOfVideos) == true){
            // insertion to db success

            if($course->insertVideos($title,$videos) == true){
                
                // move videos to server
                $course->moveVideos($videos,$title);
                
                // move img to server
                $course->moveImage($image,$title);
                
                Messages::setMsg("Course uploaded Successfully","success");
            }else{
                Messages::setMsg("Error inserting videos data into database!","error");
            }
            
        }else{
            Messages::setMsg("Error inserting data into database!","error");
        }
    }else{
        // Output all errors
        $msg = '';
        foreach ($course->getErrors() as $error) {
            $msg= $msg . $error."</br>";
        }
        Messages::setMsg($msg,"error");
    }

}