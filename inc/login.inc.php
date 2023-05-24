<?php

if (isset($_POST["submit"])) {

    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    include '../dataConn/db.class.php';
    include '../classes/login.class.php';
    include '../classes/login.contr.php';

    $login = new loginContr($uname, $pass);

    $login->loginUser();

    header('location: ../mobileD.php');

}