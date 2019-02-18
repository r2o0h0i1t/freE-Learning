<?php

include("../config.php");
include("../classes/Account.php");
include("../classes/Constants.php");

$account = new Account($con);

// Remove html tags
$fname = strip_tags($_POST['fname']);
$lname = strip_tags($_POST['lname']);
$username = strip_tags($_POST['username']);
$email = strip_tags($_POST['email']);
$pwd = strip_tags($_POST['pwd']);
$pwd2 = strip_tags($_POST['pwd2']);
$img = $_FILES['img'];

// Recaptcha response
$responseKey = $_POST['g-recaptcha-response'];


if($account->validateAll($fname,$lname,$username,$email,$pwd,$pwd2,$img) == true){ 
    // Input values are valid
    
    if($account->validateCaptcha($responseKey) == true){ 
        // Captcha response is valid

        $file_extension = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));
        $path = "..//..//assets//images//profilePictures//" .$username.'.' .$file_extension;

        $imgMoved = move_uploaded_file($img['tmp_name'], $path);

        if($imgMoved){
            if($account->register($fname,$lname,$username,$email,$pwd) == true){ 

                // Insertion into db success
                echo json_encode("Success");
                
            }else{
                $errorArray = $account->getErrors();
                array_push($errorArray, "Error inserting data into database!");
                echo json_encode($errorArray);
            }
        }else{
            $errorArray = $account->getErrors();
            array_push($errorArray, "Failed to move uploaded image!");
            echo json_encode($errorArray);
        }
    }else{
        $errorArray = $account->getErrors();
        array_push($errorArray, "Recaptcha verification failed!");
        echo json_encode($errorArray);
    }
}else{
    // Output all errors
    echo json_encode($account->getErrors());
}




