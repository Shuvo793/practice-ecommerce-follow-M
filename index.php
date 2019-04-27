<?php

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser;
use Phroute\Phroute\Dispatcher;
use Illuminate\Database\Capsule\Manager;

session_start();
require_once 'vendor/autoload.php';

$manager=new Manager();
$manager->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'ppi_ecommerce',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$manager->setAsGlobal();
$manager->bootEloquent();

$perser=new RouteParser();
$router=new RouteCollector();
require_once __DIR__.'/routers.php';

$dispatcher =new Dispatcher($router->getData());
try{
    $response=$dispatcher->dispatch($_SERVER['REQUEST_METHOD'],parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));

}catch (Exception $e){
   echo $e->getMessage();

}
echo $response;
