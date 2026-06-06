<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('search', 'Home::search');
$routes->group('game', function($routes){
    $routes->get('search', 'Home::search');
    $routes->get('(:num)', 'Home::game/$1');
});

$routes->get('login', 'Admin::login');



$routes->group('administrace', ['filter' => 'login'], static function($routes){
    $routes->get('index', 'Admin::dashboard');
});