<?php

require("../config.php");

$fname = strip_tags($_POST['fname']);
$lname = strip_tags($_POST['lname']);
$username = strip_tags($_POST['username']);
$email = strip_tags($_POST['email']);
$pwd = strip_tags($_POST['pwd']);
$pwd2 = strip_tags($_POST['pwd2']);

// Error array
$errorArray = array();

$passwordsDoNoMatch = "Your passwords don't match";
$passwordNotAlphanumeric = "Your password can only contain numbers and letters";
$passwordCharacters = "Your password must be between 5 and 30 characters";
$emailInvalid = "Email is invalid";
$emailTaken = "This email is already in use";
$lastNameCharacters = "Your last name must be between 2 and 25 characters";
$firstNameCharacters = "Your first name must be between 2 and 25 characters";
$usernameCharacters = "Your username must be between 5 and 25 characters";
$usernameTaken = "This username already exists";

$secretKey = '6LeKFY4UAAAAACm-gpvwPuvzbMoZ3ktLm8fVNnVy';
$responseKey = $_POST['g-recaptcha-response'];
$userIP = $_SERVER['REMOTE_ADDR'];

$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

$response = file_get_contents($url);
$response = json_decode($response);

if(validateAll($fname,$lname,$username,$email,$pwd,$pwd2) == true){
    if($response->success && register($fname,$lname,$username,$email,$pwd)){
            echo json_encode("Success");
    }else{
        array_push($errorArray, "Error! Please try again");
        echo json_encode($errorArray);
    }
}else{
    echo json_encode($errorArray);
}




function validateUsername($un) {

    if(strlen($un) > 25 || strlen($un) < 5) {
        array_push($GLOBALS['errorArray'], $GLOBALS['usernameCharacters']);
        return;
    }

    $checkUsernameQuery = mysqli_query($GLOBALS['con'], "SELECT username FROM users WHERE username='$un'");
    if(mysqli_num_rows($checkUsernameQuery) != 0) {
        array_push($GLOBALS['errorArray'], $GLOBALS['usernameTaken']);
        return;
    }

}
 
function validateFirstName($fn) {
    if(strlen($fn) > 25 || strlen($fn) < 2) {
        array_push($GLOBALS['errorArray'], $GLOBALS['firstNameCharacters']);
        return;
    }
}

function validateLastName($ln) {
    if(strlen($ln) > 25 || strlen($ln) < 2) {
        array_push($GLOBALS['errorArray'], $GLOBALS['lastNameCharacters']);
        return;
    }
}

function validateEmail($em) {
    if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        array_push($GLOBALS['errorArray'], $GLOBALS['emailInvalid']);
        return;
    }

    $checkEmailQuery = mysqli_query($GLOBALS['con'], "SELECT email FROM users WHERE email='$em'");
    if(mysqli_num_rows($checkEmailQuery) != 0) {
        array_push($GLOBALS['errorArray'], $GLOBALS['emailTaken']);
        return;
    }

}

function validatePasswords($pw, $pw2) {

    if($pw != $pw2) {
        array_push($GLOBALS['errorArray'], $GLOBALS['passwordsDoNoMatch']);
        return;
    }

    if(preg_match('/[^A-Za-z0-9]/', $pw)) {
        array_push($GLOBALS['errorArray'], $GLOBALS['passwordNotAlphanumeric']);
        return;
    }

    if(strlen($pw) > 30 || strlen($pw) < 5) {
        array_push($GLOBALS['errorArray'], $GLOBALS['passwordCharacters']);
        return;
    }

}

function register($fn,$ln,$un,$em,$pw){
    $encryptedPw = md5($pw);
    $date = date("Y/m/d");

    $result = mysqli_query($GLOBALS['con'], "INSERT INTO users VALUES ('', '$fn', '$ln', '$un','$em', '$encryptedPw','$date')");
    return $result;
}
function validateAll($fn,$ln,$un,$em,$p1,$p2){
    validateFirstName($fn);
    validateLastName($ln);
    validateUsername($un);
    validateEmail($em);
    validatePasswords($p1,$p2);

    return empty($GLOBALS['errorArray']);
}