<?php

include("includes/config.php");
include("includes/classes/Messages.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

// Check if register form is submitted
if(isset($_POST['registerBtn'])){

    // Check if user checked recaptcha box
    if($_POST['g-recaptcha-response'] == ""){
        // Set error msg
        Messages::setMsg("Please Check captcha box","error");
    }else{
        // New account object
        $account = new Account($con);

        // Remove html tags
        $fname = strip_tags($_POST['fname']);
        $lname = strip_tags($_POST['lname']);
        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);
        $pwd = strip_tags($_POST['pwd']);
        $pwd2 = strip_tags($_POST['pwd2']);
        
        // Profile picture
        $img = $_FILES['img'];

        // Recaptcha response
        $responseKey = $_POST['g-recaptcha-response'];

        // Validate all inputs
        if($account->validateAll($fname,$lname,$username,$email,$pwd,$pwd2,$img) == true){ 
            
            // Validate captcha response
            if($account->validateCaptcha($responseKey) == true){ 

                // Get image extension: convert to lcase first
                $file_extension = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));

                // Set destination path for image
                $path = "assets//images//profilePictures//" .$username.'.' .$file_extension;

                // Move img to path
                $imgMoved = move_uploaded_file($img['tmp_name'], $path);

                // Check if img moved correctly
                if($imgMoved){

                    // Check if data was inserted to db correctly
                    if($account->register($fname,$lname,$username,$email,$pwd) == true){ 

                        // Create session for user
                        $_SESSION['userLoggedInName'] = $username;
                    
                        // Go to dashboard
                        header("Location: dashboard.php");
                        
                    }else{

                        Messages::setMsg("Error inserting data into database!","error");
                    }
                }else{

                    Messages::setMsg("Failed to move uploaded image!","error");
                }
            }else{

                Messages::setMsg("Recaptcha verification failed!","error");
            }
        }else{
            $msg = '';
            
            // Output all errors
            foreach ($account->getErrors() as $error) {
                $msg= $msg . $error."</br>";
            }
            
            Messages::setMsg($msg,"error");
        }
    }
}