<?php

class loginContr extends Login{

    private $uname;
    private $pass;

    public function __construct($uname, $pass) {

        $this->uname = $uname;
        $this->pass = $pass;

    }

    public function loginUser() {

        if ($this->emptyInput() == false) {
            echo "Please fill all fields!";
            header("location: ../login.php?error=emptyInput");
            exit();
        }

        $this->getUser($this->uname, $this->pass);
    }

    private function emptyInput() {
        $result = "";
        if (empty($this->uname || $this->pass)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}