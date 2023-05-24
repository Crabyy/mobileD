<?php

class Login extends Database {

    protected function getUser($uname, $pass) {
        $stmt = $this->conn()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($uname, $pass))) {
            $stmt = null;
            header("location: ../login.php?error=stmtFailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../login.php?error=stmtFailed');
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($pass, $passHashed[0]["password"]);

        if ($checkPass == false) {
            header('location: ../login.php?error=wrongPass');
            exit();
        } elseif ($checkPass == true) {
            $stmt = $this->conn()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');

            if (!$stmt->execute(array($uname, $pass, $uname))) {
                $stmt = null;
                header("location: ../login.php?error=stmtFailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header('location: ../login.php?error=stmtFailed');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();

            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["uname"] = $user[0]["username"];

            $stmt = null;

        }

    }

}