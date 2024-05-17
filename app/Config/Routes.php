<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('clientes', 'Clientes::index');
$routes->get('clientes/new', 'Clientes::new');
$routes->put('clientes/(:num)', 'Clientes::update/$1');


$routes->resource('clientes', ['placeholder' => '(:num)', 'except' => 'show']);
