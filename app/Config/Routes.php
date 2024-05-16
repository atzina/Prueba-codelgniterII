<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//$routes->get('clientes', 'Clientes::index');
//$routes->get('clientes/new', 'Clientes::new');

$routes->resource('clientes', ['placeholder' => '(:num)', 'except' => 'show']);
