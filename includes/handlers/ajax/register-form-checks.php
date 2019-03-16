<?php

require("../../config.php");
require("../../classes/Constants.php");
require("../../classes/Account.php");

$account = new Account($con);

if(isset($_POST["uname"])){
    $uname = $_POST["uname"];
    $account->validateUsername($uname);

    $errors = $account->getErrors();
    echo json_encode($errors);
}
if(isset($_POST["fname"])){
    $fname = $_POST["fname"];
    $account->validateFirstName($fname);

    $errors = $account->getErrors();
    echo json_encode($errors);
}
if(isset($_POST["lname"])){
    $lname = $_POST["lname"];
    $account->validateLastName($lname);

    $errors = $account->getErrors();
    echo json_encode($errors);
}
if(isset($_POST["email"])){
    $email = $_POST["email"];
    $account->validateEmail($email);

    $errors = $account->getErrors();
    echo json_encode($errors);
}
if(isset($_POST["pwd1"])){
    $pwd1 = $_POST["pwd1"];
    $account->validatePasswords($pwd1);

    $errors = $account->getErrors();
    echo json_encode($errors);
}
if(isset($_POST["pwd2"])){
    $pwd2 = $_POST["pwd2"];
    $account->validatePasswords($pwd2);

    $errors = $account->getErrors();
    echo json_encode($errors);
}