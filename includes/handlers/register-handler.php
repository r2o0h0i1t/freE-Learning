<?php

include("../config.php");
include("../classes/Account.php");
include("../classes/Constants.php");

$account = new Account($con);

$fname = strip_tags($_POST['fname']);
$lname = strip_tags($_POST['lname']);
$username = strip_tags($_POST['username']);
$email = strip_tags($_POST['email']);
$pwd = strip_tags($_POST['pwd']);
$pwd2 = strip_tags($_POST['pwd2']);
$responseKey = $_POST['g-recaptcha-response'];


if($account->validateAll($fname,$lname,$username,$email,$pwd,$pwd2) == true){
    if($account->validateCaptcha($responseKey) == true){
        if($account->register($fname,$lname,$username,$email,$pwd) == true){
            echo json_encode("Success");
        }else{
            $errorArray = $account->getErrors();
            array_push($errorArray, "Error inserting data into database!");
            echo json_encode($errorArray);
        }
    }else{
        $errorArray = $account->getErrors();
        array_push($errorArray, "Recaptcha verification failed!");
        echo json_encode($errorArray);
    }
}else{
    echo json_encode($account->getErrors());
}




