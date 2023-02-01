<?php
require_once APPROOT . '/Libries/Route.php';
require_once APPROOT . '/Libries/RouteClass.php';
require_once APPROOT.'/Static/HttpMethod.php';

use App\Core\Route;
use App\Statics\HttpMethod;
$class = new Route();

$class::route('/',"\App\Controllers\AppController",'index',null,HttpMethod::$GET);
$class::route('/add-product',"\App\Controllers\AppController",'addProduct',null,HttpMethod::$GET);
$class::route('/add-product',"\App\Controllers\AppController",'addProductPost',null,HttpMethod::$POST);
$class::route('/remove-product',"\App\Controllers\AppController",'removeProducts',null,HttpMethod::$POST);
