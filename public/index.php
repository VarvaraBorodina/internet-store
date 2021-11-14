<?php
include '../vendor/autoload.php';

$routes = [
    '/' => 'App\\Controllers\\SiteController@index',
    '/catalog' => 'App\\Controllers\\CatalogController@index',
    '/catalog/10' => 'App\\Controllers\\CatalogController@showProduct',
];
$runAction = 'App\\Controllers\\SiteController@notFound';

foreach ($routes as $route => $action){
    if($_SERVER['REQUEST_URI'] == $route) {
        $runAction = $action;
          break;
    }
}

$runAction = explode('@',$runAction);

$controller = new $runAction[0];
$controller->{$runAction[1]}();