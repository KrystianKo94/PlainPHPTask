<?php

namespace App\Abstracts;

use App\Interfaces\IDatabaseConn;
use PDO;
use PDOException;

abstract class BaseDatabase implements IDatabaseConn
{
    protected PDO $connectPDO;
    public function connection($driver, $host, $database, $username, $password)
    {
        $dns = "$driver:host=$host;dbname=$database;charset=UTF8";
        try {
            $this->connectPDO = new PDO($dns, $username, $password);
            $this->connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    public function getConnection(): PDO
    {
        return $this->connectPDO;
    }
}