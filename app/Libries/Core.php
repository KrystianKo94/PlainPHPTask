<?php

namespace App\Core;

use App\Core\RouteClass;

class Core
{
    protected $currentController = null;
    protected $currentMethod = null;
    protected $params = [];

    public function __construct()
    {
        $class = Route::getRoute($_SERVER['REQUEST_URI']);
        if ($class == null) {
            return "404";
        } else {
            $className = $class->getClass();
            $this->currentController = new $className;
        }
        if ($this->currentController != null) {
            if (method_exists($this->currentController, $class->getMethod())) {
               if ($class->getParams() == null) {
                   $this->currentController->{$class->getMethod()}();
               } else {
                    echo "Parametry";
               }
            } else {
                echo "Nie ma takiej metody";
            }
        }
    }
}
