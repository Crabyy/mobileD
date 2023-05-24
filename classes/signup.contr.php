<?php

class signupContr extends Signup{

    private $name;
    private $uname;
    private $email;
    private $pass;
    private $conpass;

    public function __construct($name, $uname, $email, $pass, $conpass) {

        $this->name = $name;
        $this->uname = $uname;
        $this->email = $email;
        $this->pass = $pass;
        $this->conpass = $conpass;

    }

    public function signUpUser() {

        if ($this->emptyInput() == false) {
            // echo "Please fill all fields!";
            header("location: ../signup.php?error=emptyInput");
            exit();
        }

        if ($this->invalidUname() == false) {
            // echo "Invalid Username!";
            header("location: ../signup.php?error=invalidUname");
            exit();
        }

        if ($this->invalidEmail() == false) {
            // echo "Invalid Username!";
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }

        if ($this->passNotMatch() == false) {
            // echo "Passwords do not match!";
            header("location: ../signup.php?error=passNotMatch");
            exit();
        }

        if ($this->alreadyExist() == false) {
            // echo "Username or Email already taken!";
            header("location: ../signup.php?error=alreadyExist");
            exit();
        }

        $this->setUser($this->name, $this->uname,  $this->email, $this->pass);
    }

    private function emptyInput() {
        $result = false;
        if (empty($this->name || $this->uname || $this->email || $this->pass || $this->conpass)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUname() {
        $result = false;
        if (!preg_match('/^[a-zA-Z0-9]*$/', $this->uname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passNotMatch() {
        $result = false;
        if ($this->pass !== $this->conpass) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function alreadyExist() {
        $result = false;
        if (!$this->checkUser($this->uname, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}