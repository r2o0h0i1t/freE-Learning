<?php

class Account{
    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function validateUsername($un) {

        if(strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
    
        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
        if(mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    
    }
     
    public function validateFirstName($fn) {
        if(strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }
    
    public function validateLastName($ln) {
        if(strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }
    
    public function validateEmail($em) {
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }
    
        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
        if(mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
    
    }
    
    public function validatePasswords($pw, $pw2) {
    
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDoNoMatch);
            return;
        }
    
        if(preg_match('/[^A-Za-z0-9]/', $pw)) {
            array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
            return;
        }
    
        if(strlen($pw) > 30 || strlen($pw) < 5) {
            array_push($this->errorArray, Constants::$passwordCharacters);
            return;
        }
    
    }

    public function validateCaptcha($responseKey){
        $secretKey = '6LeKFY4UAAAAACm-gpvwPuvzbMoZ3ktLm8fVNnVy';
        $userIP = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

        $response = file_get_contents($url);
        $response = json_decode($response);

        return $response->success;
    }
    
    public function register($fn,$ln,$un,$em,$pw){
        $encryptedPw = md5($pw);
        $date = date("Y/m/d");
    
        $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$fn', '$ln', '$un','$em', '$encryptedPw','$date')");
        return $result;
    }

    public function validateAll($fn,$ln,$un,$em,$p1,$p2){
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmail($em);
        $this->validatePasswords($p1,$p2);
    
        return empty($this->errorArray);
    }

    public function getErrors(){
        return $this->errorArray;
    }
}