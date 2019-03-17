<?php

include("../config.php");
include("../classes/Account.php");
include("../classes/Constants.php");


$fname = strip_tags($_POST['fname']);
$lname = strip_tags($_POST['lname']);
$username = strip_tags($_POST['uname']);
$email = strip_tags($_POST['email']);
$pwd1 = strip_tags($_POST['pwd1']);
$pwd2 = strip_tags($_POST['pwd2']);
$recaptchaResponse = $_POST['g-recaptcha-response'];
$img = $_FILES['img'];


    if($recaptchaResponse == ""){
        echo json_encode("Please check recaptcha box");
        return;
    }
    
    $account = new Account($con);

    // Recaptcha verification
    if($account->validateCaptcha($recaptchaResponse) == false){
        echo json_encode("Recaptcha verification failed");
        return;
    }

    if($account->validateImage($img) == false){
        echo json_encode($account->getErrors());
        return;
    }

    // Get image extension: convert to lcase first
    $file_extension = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));

    // Set destination path for image
    $path = "..//..//assets//images//profilePictures//" .$username.'.' .$file_extension;

    // Move img to path
    $imgMoved = move_uploaded_file($img['tmp_name'], $path);

    // Check if img moved correctly
    if(!$imgMoved){
        echo json_encode("Image not saved to server");
        return;
    }

    // Check if data was inserted to db correctly
    if($account->register($fname,$lname,$username,$email,$pwd1) == false){ 
        echo json_encode("Error inserting data to database");
        return;
    }

    // Create session for user
    $_SESSION['userLoggedInName'] = $username;

    echo json_encode("success");