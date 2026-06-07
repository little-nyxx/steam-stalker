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

/* $routes->group('item', function($routes){
    $routes->get('add', 'Item::add');
    $routes->post('create', 'Item::create');
}); */

$routes->post('login', 'Admin::login');

/* $routes->group('Login/dashboard', ['filter' => 'login'], static function($routes){
    $routes->get('index', 'Admin::dashboard');
}); */
$routes->get('login', 'Login::index');
$routes->get('dashboard', 'Admin::index');
$routes->get('/item/add', 'Item::add');
$routes->post('/item/create', 'Item::create');
$routes->get('/game/(:num)/edit', 'Item::edit/$1');
$routes->put('/item/update', 'Item::update');
$routes->post('/item/(:num)/delete', 'Item::delete/$1');