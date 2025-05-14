<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/send-email', 'sendEmailController::index');

service('auth')->routes($routes);
$routes->get('/', 'Home::index');
