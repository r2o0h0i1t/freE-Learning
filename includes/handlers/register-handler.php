<?php

include("includes/config.php");
include("includes/classes/Messages.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

if(isset($_POST['registerBtn'])){

if($_POST['g-recaptcha-response'] == ""){
    Messages::setMsg("Please Check captcha box","error");
}else{

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
            $path = "assets//images//profilePictures//" .$username.'.' .$file_extension;

            $imgMoved = move_uploaded_file($img['tmp_name'], $path);

            if($imgMoved){
                if($account->register($fname,$lname,$username,$email,$pwd) == true){ 

                    $_SESSION['userLoggedInName'] = $username;
                  
                    // Go to dashboard
                    header("Location: dashboard.php");

                    
                }else{
                    $errorArray = $account->getErrors();
                    array_push($errorArray, "Error inserting data into database!");
                    Messages::setMsg($errorArray[0],"error");
                }
            }else{
                $errorArray = $account->getErrors();
                array_push($errorArray, "Failed to move uploaded image!");
                Messages::setMsg($errorArray[0],"error");
            }
        }else{
            $errorArray = $account->getErrors();
            array_push($errorArray, "Recaptcha verification failed!");
            Messages::setMsg($errorArray[0],"error");
        }
    }else{
        // Output all errors
        $msg = '';
        foreach ($account->getErrors() as $error) {
            $msg= $msg . $error."</br>";
        }
        Messages::setMsg($msg,"error");
    }
}
}