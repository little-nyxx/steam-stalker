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
    $routes->post('(:num)/(:num)', 'Home::test/$1/$2');
    $routes->get('choose', 'Home::choose');
    $routes->get('stats', 'Home::stats');
});

$routes->group('item', function($routes){
    $routes->get('add', 'Item::add');
    $routes->post('create', 'Item::create');
    $routes->post('update/(:num)', 'Item::update/$1');
    $routes->post('(:num)/delete', 'Item::delete/$1');
});

$routes->post('login', 'Admin::login');

/* $routes->group('Login/dashboard', ['filter' => 'login'], static function($routes){
    $routes->get('index', 'Admin::dashboard');
}); */
$routes->get('login', 'Login::index');
$routes->get('dashboard', 'Admin::index');
$routes->get('/game/(:num)/edit', 'Item::edit/$1');

