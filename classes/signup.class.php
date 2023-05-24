<?php

class Signup extends Database {

    protected function setUser($name, $uname, $email, $pass) {

        $stmt = $this->conn()->prepare('INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?);');

        $hashedpass = password_hash($pass, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($name, $uname, $email, $hashedpass))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }

        $stmt = null;

    }

    protected function checkUser($uname, $email) {
        $stmt = $this->conn()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($uname, $email))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }
        $resultChck = false;
        if ($stmt->rowCount() > 0) {
            $resultChck = false;
        }else {
            $resultChck = true;
        }
        return $resultChck;
    }

}