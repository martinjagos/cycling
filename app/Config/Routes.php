<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/races', 'RaceController::index');

$routes->get('login', 'Auth::login');
$routes->post('login-complete', 'Auth::loginComplete');
$routes->get('logout', 'Auth::logout');


$routes->get('register', 'Auth::register');
$routes->post('register-complete', 'Auth::registerComplete');
$routes->post('register-username', 'Auth::registerUsername');
$routes->post('register-email', 'Auth::registerEmail');


$routes->get('/races/(:any)', 'RaceController::showRaces/$1');