<?php

namespace App\Core;

use App\Abstracts\BaseDatabase;
use \PDOStatement;

class Database extends BaseDatabase
{

    private PDOStatement $statement;
    public function __construct() {
        $this->connection(DRIVER,DB_HOST,DB_NAME,DB_USER,DB_PASS);
    }

    public function executeQuery( $sql){
        $statement= $this->connectPDO->query($sql);
        return $statement->fetchAll();
    }

    public function prepareStatement($sql){
        $this->statement=$this->connectPDO->prepare($sql);
    }

    public function bindParameter($name,$value,$typeParameter){
        if($this->statement!= null){
            $this->statement->bindParam($name,$value,$typeParameter);
        }
    }

    public function executeInsert(){
        $id=0;
        try {
            $this->connectPDO->beginTransaction();
            $this->statement->execute();
            $id=$this->connectPDO->lastInsertId();
            $this->connectPDO->commit();
        }
        catch (\PDOException $ex ){
            $this->connectPDO->rollBack();
            echo $ex->getMessage();
        }
        return $id;
    }
    public function executeSave(){
        $id=0;
        try {
            $this->connectPDO->beginTransaction();
            $this->statement->execute();
            $this->connectPDO->commit();
        }
        catch (\PDOException $ex ){
            $this->connectPDO->rollBack();
            echo $ex->getMessage();
        }
        return $id;
    }

    public function execute(){
        $this->statement->execute();
        return $this->statement->fetchAll();
    }


}
