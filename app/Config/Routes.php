<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('clientes', 'Clientes::index');
$routes->get('clientes/new', 'Clientes::new');
$routes->post('clientes', 'Clientes::create');
$routes->get('clientes/(:num)/edit', 'Clientes::edit/$1');
$routes->put('clientes/(:num)', 'Clientes::update/$1');
$routes->delete('clientes/(:num)', 'Clientes::delete/$1');

$routes->resource('clientes', ['placeholder' => '(:num)', 'except' => 'show']);
