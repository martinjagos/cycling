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
$routes->get('/races-info/(:any)/(:num)', 'RaceController::showRacesInformation/$1/$2');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/pdf/(:num)', 'PdfController::pdf/$1');
$routes->get('/riders', 'RidersController::index');
$routes->get('/secret', 'PdfController::secret');

$routes->group('dashboard', ['filter' => 'dashboard'], function ($routes) {

    $routes->delete('delete-race/(:num)', 'Dashboard::deleteRace/$1');//Deletes the user in the database.
    $routes->get('add-race', 'Dashboard::addRace');//Deletes the user in the database.
    $routes->put('create-race', 'Dashboard::createRace');//Deletes the user in the database.
});