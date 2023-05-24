<?php

require_once '../dataConn/db.class.php';

class mobileDuser extends Database {
    protected $dbtable = "mobiledirect";
    
    //add account
    public function add($data) {
        if (!empty($data)) {
            $fileds = $placeholder=[];
            foreach ($data as $field => $value) {
                $fileds[]=$field;
                $placeholder[]=":{field}"; 
            }
        }
        $sql = "INSERT INTO {$this->dbtable} (". implode(',',$fileds).") VALUES (". implode(',',$placeholder).")";

        $stmt = $this->conn()->prepare($sql);

        try {
            $this->conn()->beginTransaction();
            $stmt->execute($data);
            $lastInsertId = $this->conn()->lastInsertId();
            $this->conn()->commit();
            return $lastInsertId;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            $this->conn()->rollBack();
        }
    }
}