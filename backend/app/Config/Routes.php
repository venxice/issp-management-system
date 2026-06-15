<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('login', 'AuthController::loginForm');
$routes->post('login', 'AuthController::login');
$routes->get('auth/google', 'AuthController::googleRedirect');
$routes->get('auth/google/callback', 'AuthController::googleCallback');
$routes->post('logout', 'AuthController::logout', ['filter' => 'auth']);

$routes->group('', ['filter' => 'auth'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('db-test', 'DbTest::index', ['filter' => 'role:admin']);
});

$routes->group('', ['filter' => 'role:admin'], static function (RouteCollection $routes): void {
    $routes->get('users', 'UsersController::index');
    $routes->get('users/create', 'UsersController::create');
    $routes->post('users', 'UsersController::store');
    $routes->get('users/(:num)/edit', 'UsersController::edit/$1');
    $routes->post('users/(:num)', 'UsersController::update/$1');
    $routes->post('users/(:num)/deactivate', 'UsersController::deactivate/$1');

    $routes->get('audit-logs', 'AuditLogsController::index');
});
