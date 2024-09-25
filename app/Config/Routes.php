<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/races', 'RaceController::index');

$routes->get('/races/(:any)', 'RaceController::showRaces/$1');