<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Pages::home');
$routes->get('/about', 'Pages::about');
$routes->get('/customers', 'Customers::index');
$routes->get('/users', 'Users::index');