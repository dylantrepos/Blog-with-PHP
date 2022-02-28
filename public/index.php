<?php

use App\Helpers\Get;

require './vendor/autoload.php';

define('DEBUG_TIME', microtime(true));

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$__GET = Get::_GET();

if(isset($__GET['page']) && $__GET['page'] === "1"){
    $uri = $_SERVER["REQUEST_URI"];
    $uri = explode("?", $_SERVER["REQUEST_URI"])[0];
    $get = $__GET;
    unset($get['page']);
    $query = http_build_query($get);
    if(!empty($query)){
        $uri = $uri . "?" . $query;
    }
    header('Location: ' . $uri);
    http_response_code(301);
    exit();
}


$router = new App\Router(dirname(__DIR__) . '/views');
$router->get("/", 'post/index', 'home');
$router->get('/blog/post/[*:slug]-[i:id]', 'post/show', 'post');
$router->get("/blog/category", 'category/show', 'categorie');
$router->run();


