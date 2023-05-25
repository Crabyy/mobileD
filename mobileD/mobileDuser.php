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

    //to get rows
    public function getRows($start=0,$limit=4){
        $sql = "SELECT * FROM {$this->dbtable} ORDER BY DESC LIMIT {$start}, {$limit}";
        $stmt = $this->conn()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $results=[];
        }
        return $results;
    }

    //single rows
    public function getRow($field, $value) {
        $sql = "SELECT * FROM {$this->dbtable} WHERE {$field}=:{$field}";

        $stmt = $this->conn()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            $result=[];
        }
        return $result;
    }

    //count number of rows
    public function getCount() {
        $sql = "SELECT count(*) AS pcount FROM {$this->dbtable}";

        $stmt = $this->conn()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pcount'];
    }

    //upload image
    public function uploadImage($file){
        if(!empty($file)){
            $fileTempPath=$file['tmp_name'];
            $fileName=$file['name'];
            $fileType = $file['type'];
            $fileNameCmps = explode('.', $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time().$fileName) . '.' . $fileExtension;
            $allowedExtension = ["png", "jpg", "jpeg"];

            if (in_array($fileExtension,$allowedExtension)) {
                $uploadFileDir = getcwd().'../uploads/img';
                $destFilePath = $uploadFileDir . $newFileName;

                if (move_uploaded_file($fileTempPath, $destFilePath)) {
                    return $newFileName;
                }
            }
        }
    }

}