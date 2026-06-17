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

$routes->group('admin', ['filter' => 'role:admin'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->get('users', 'Admin\UsersController::index');
    $routes->get('users/create', 'Admin\UsersController::create');
    $routes->post('users', 'Admin\UsersController::store');
    $routes->get('users/(:num)/edit', 'Admin\UsersController::edit/$1');
    $routes->post('users/(:num)', 'Admin\UsersController::update/$1');
    $routes->post('users/(:num)/deactivate', 'Admin\UsersController::deactivate/$1');
    $routes->post('users/(:num)/reactivate', 'Admin\UsersController::reactivate/$1');

    $routes->get('audit-logs', 'Admin\AuditLogsController::index');
});

$routes->group('', ['filter' => 'role:admin'], static function (RouteCollection $routes): void {
    $routes->get('users', 'Admin\UsersController::index');
    $routes->get('users/create', 'Admin\UsersController::create');
    $routes->post('users', 'Admin\UsersController::store');
    $routes->get('users/(:num)/edit', 'Admin\UsersController::edit/$1');
    $routes->post('users/(:num)', 'Admin\UsersController::update/$1');
    $routes->post('users/(:num)/deactivate', 'Admin\UsersController::deactivate/$1');
    $routes->post('users/(:num)/reactivate', 'Admin\UsersController::reactivate/$1');

    $routes->get('audit-logs', 'Admin\AuditLogsController::index');
});

$routes->group('director-general', ['filter' => 'role:director_general'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'DirectorGeneral\DashboardController::index');
});

$routes->group('employee', ['filter' => 'role:employee'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'Employee\DashboardController::index');
});

$routes->group('ict-planner', ['filter' => 'role:ict_planner'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'IctPlanner\DashboardController::index');
});

$routes->group('director-general', ['filter' => 'role:director_general'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'DashboardController::index');
});

$routes->group('employee', ['filter' => 'role:employee'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'DashboardController::index');
});

$routes->group('ict-planner', ['filter' => 'role:ict_planner'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'DashboardController::index');
});
