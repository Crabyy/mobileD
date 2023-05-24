<?php
include 'dataConn/db.class.php';
include 'classes/signup.class.php';

$signup = new Signup();
$conn = $signup->conn();

$name = "John";
$uname = "john123";
$email = "john@example.com";
$pass = "password";

$stmt = $conn->prepare('INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?);');
$hashedpass = password_hash($pass, PASSWORD_DEFAULT);
$stmt->execute([$name, $uname, $email, $hashedpass]);