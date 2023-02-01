<?php

namespace App\Core;

use App\Traits\Request;

class Validation
{
    use Request;

    private $error = array();
    protected function required($field)
    {
        if ($field != null) {
            return true;
        }
        return false;
    }

    protected function numeric($field)
    {
        if (is_numeric($field)) {
            return true;
        }
        return false;
    }

    public function validate($rules, $message)
    {
        $isError = true;
        foreach ($rules as $name => $rule) {
            $value = $this->getPOST($name);
            $rulesName = explode("|", $rule);
            $messageError = array();
            foreach ($rulesName as $explodeRule) {
                if (!$this->{$explodeRule}($value)) {
                    $isError = false;
                    $messageError[sizeof($messageError)] = $message[$name][$explodeRule];
                }
            }
            $this->error[$name] = $messageError;
        }
        return $isError;
    }

    public function getError()
    {
        return $this->error;
    }
}
