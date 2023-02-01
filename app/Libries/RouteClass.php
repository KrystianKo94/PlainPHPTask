<?php

namespace App\Core;

class RouteClass
{
    private $params;
    private $class;
    private $alias;
    private $method;
    private $http;

    /**
     * @param $params
     * @param $class
     * @param $alias
     * @param $method
     * @param $http
     */
    public function __construct($params, $class, $alias, $method, $http)
    {
        $this->params = $params;
        $this->class = $class;
        $this->alias = $alias;
        $this->method = $method;
        $this->http = $http;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param mixed $alis
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getHttp()
    {
        return $this->http;
    }

    /**
     * @param mixed $http
     */
    public function setHttp($http)
    {
        $this->http = $http;
    }
}
