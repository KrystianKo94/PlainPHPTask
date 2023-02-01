<?php

namespace App\Core;

use App\Traits\Request;

class Controller
{
    use Request;
    public function view($view, $data = [])
    {
        foreach ($data as $key => $value){
            ${$key} = $value ;
        }
        if (file_exists('../app/Views/' . $view . '.php')) {
            require_once '../app/Views/' . $view . '.php';
        } else {
            die("View does not exists.");
        }
    }
}
