<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Employee::index', ['filter' => 'auth']);

$routes->group('employee', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Employee::index');
    $routes->get('add', 'Employee::addEmployee');
    $routes->post('store', 'Employee::store');
    $routes->post('update/(:num)', 'Employee::update/$1');
    $routes->get('edit/(:num)', 'Employee::edit/$1');
    $routes->get('delete/(:num)', 'Employee::delete/$1');
});

$routes->group('users', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->get('add', 'User::add');
    $routes->post('store', 'User::store');
    $routes->post('update/(:num)', 'User::update/$1');
    $routes->get('edit/(:num)', 'User::edit/$1');
    $routes->get('delete/(:num)', 'User::delete/$1');
});

//Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

//Display Image
$routes->get('display-image/(:segment)', 'Employee::displayImage/$1');

