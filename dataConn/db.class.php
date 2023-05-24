<?php

class Database {

    protected function conn() {
        try {
            $dbuser = "root";
            $dbpass = "";
            $dbh = new PDO('mysql:host=localhost;dbname=mobiled', $dbuser, $dbpass);
            return $dbh;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
        }

    }
}