<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $conpass = $_POST["conpass"];

    include '../dataConn/db.class.php';
    include '../classes/signup.class.php';
    include '../classes/signup.contr.php';

    $signUp = new signupContr($name, $uname, $email, $pass, $conpass);

    $signUp->signUpUser();

    header('location: ../signup.php?success=registered');
    exit();

}