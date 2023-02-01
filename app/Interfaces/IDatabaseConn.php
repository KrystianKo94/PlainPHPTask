<?php

namespace App\Interfaces;
use PDO;
interface IDatabaseConn
{
    public function connection($driver, $host, $database, $username, $password);
    public function getConnection():PDO;

}