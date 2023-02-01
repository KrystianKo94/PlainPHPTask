<?php

namespace App\Core;

use App\Core\RouteClass;

class Route
{
    private static $routes = array();

    public function __construct()
    {
    }

    public static function route($alias, $class, $function, $params, $http)
    {
        $routeUser = new RouteClass($params, $class, $alias, $function, $http);
        array_push(static::$routes, $routeUser);
    }

    public static function getRoute($alias)
    {
        foreach (static::$routes as $route) {
            if ($route->getAlias() == $alias && $_SERVER['REQUEST_METHOD'] == $route->getHttp()) {
                return $route;
            }
        }
    }
}
