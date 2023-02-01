<?php

namespace App\Traits;

trait ParameterType
{
    public function getTypeValuePDO($value){
        if(is_bool($value)){
            return \PDO::PARAM_BOOL;
        }
        if(is_numeric($value)){
            return \PDO::PARAM_INT;
        }
        return \PDO::PARAM_STR;
    }
}