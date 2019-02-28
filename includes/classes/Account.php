<?php

class Account{
    private $con; // db connection
    private $errorArray; // Array to hold all errors

    // Construtor: Set values of private variables
    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    /**
     *
     * Validate user login: Check if username & password exists in db
     *
     * @param    $un  Username from login form
     * @param    $pw  Password from login form
     * @return   boolean : if user login is valid
     *
    */
    public function validateUserLogin($un,$pw){
        $pw = md5($pw);

        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND pwd='$pw'");

        if(mysqli_num_rows($query) == 1) {
            return true;
        }
        else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    /**
     *
     * Validate username: - Check if username already exists
     *                    - Check length
     * @param    $un  Username from register form
     * @return   NULL
     *
    */
    public function validateUsername($un) {

        if(strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
        // Check if username exists
        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");

        if(mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    
    }

    /**
     *
     * Validate first name: - Check length
     * @param    $fn  first name from register form
     * @return   NULL
     *
    */     
    public function validateFirstName($fn) {
        if(strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }
    
    /**
     *
     * Validate last name: - Check length
     * @param    $ln  last name from register form
     * @return   NULL
     *
    */
    public function validateLastName($ln) {
        if(strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }

    /**
     *
     * Validate email: - Check if already exists
     *                 - Check if valid format
     * @param    $em  email from register form
     * @return   NULL
     *
    */    
    public function validateEmail($em) {
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        // Check if email exists
        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");

        if(mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
    
    }

    /**
     *
     * Validate passwords: - Check if they are same
     *                     - Check if alphanumeric
     *                     - Check length
     * @param    $pw  password from register form
     * @param    $pw2  password 2 from register form
     * @return   NULL
     *
    */    
    public function validatePasswords($pw, $pw2) {
    
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDoNoMatch);
            return;
        }
    
        // Check if password is alphanumeric
        if(preg_match('/[^A-Za-z0-9]/', $pw)) {
            array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
            return;
        }
    
        if(strlen($pw) > 30 || strlen($pw) < 5) {
            array_push($this->errorArray, Constants::$passwordCharacters);
            return;
        }
    
    }

    /**
     *
     * Validate Image: - Check if file extension valid
     *                 - Check size of image
     * @param    $img  image file from register form
     * @return   NULL
     *
    */
    public function validateImage($img){
        // Select file type
        $file_extension = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));
    
        // Valid file extensions
        $imageFileType = array("jpg");
    
        // Check extension
        if(!in_array($file_extension,$imageFileType) ){
            array_push($this->errorArray, Constants::$invalidImageFormat);
            return;
        }
        // Check size of img
        if (($img["size"] > 2000000)) {
            array_push($this->errorArray, Constants::$imageTooLarge);
            return;
        }
    
    }

    /**
     *
     * Validate Recaptcha: - Check if response of recaptcha valid :: Not a bot
     * 
     * @param    $responseKey  Response of recaptcha from register form
     * @return   BOOLEAN Sucess or failure
     *
    */
    public function validateCaptcha($responseKey){
        // Get ip address of user
        $userIP = $_SERVER['REMOTE_ADDR'];
        
        // Url for captcha verification
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=".Constants::$captchaSecretKey. "&response=$responseKey&remoteip=$userIP";

        $response = file_get_contents($url);
        $response = json_decode($response);

        // If success
        return $response->success;
    }

    /**
     *
     * Validate database entry: - Check if data is inserted in db correctly
     * 
     * @param    $fn,$ln,$un,$em,$pw  fname,lnam,usernam,email,password from register form
     * @return   BOOLEAN Sucess or failure
     *
    */
    public function register($fn,$ln,$un,$em,$pw){
        // Encrypt password
        $encryptedPw = md5($pw);
        $date = date("Y/m/d");
    
        // Insert values to db
        $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$fn', '$ln', '$un','$em', '$encryptedPw','$date')");
        return $result;
    }
    
    /**
     *
     * Validate all user inputs from register form: Validate all at once
     * 
     * @param    $fn,$ln,$un,$em,$p1,$p2,$img  fname,lnam,usernam,email,password,password 1, password 2 from register form
     * @return   BOOLEAN Sucess or failure
     *
    */
    public function validateAll($fn,$ln,$un,$em,$p1,$p2,$img){
        // Validate all inputs

        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmail($em);
        $this->validatePasswords($p1,$p2);
        $this->validateImage($img);

        return empty($this->errorArray);
    }

    public function getErrors(){
        return $this->errorArray;
    }
}