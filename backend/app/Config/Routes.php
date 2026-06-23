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
    $routes->post('submit-issp', 'Employee\DashboardController::submitISSP');
    $routes->post('save-draft', 'Employee\DashboardController::saveDraft');
    $routes->get('submitted-ict-projects', 'Employee\DashboardController::submittedIctProjects');
    $routes->get('draft-ict-projects', 'Employee\DashboardController::draftIctProjects');
    
    // Proposed ICT Strategy Routes
    $routes->group('proposed-ict-strategy', static function (RouteCollection $routes): void {
        // Network Infrastructure (Combined A.1 and A.2)
        $routes->get('network-infrastructure', 'Employee\ProposedIctStrategyController::networkInfrastructure');
        $routes->post('network-infrastructure/save', 'Employee\ProposedIctStrategyController::saveNetworkInfrastructure');
        
        // Enterprise Architecture
        $routes->get('enterprise-architecture', 'Employee\ProposedIctStrategyController::enterpriseArchitecture');
        $routes->post('enterprise-architecture/save', 'Employee\ProposedIctStrategyController::saveEnterpriseArchitecture');
        
        // ICT Human Capital
        $routes->get('ict-human-capital', 'Employee\ProposedIctStrategyController::ictHumanCapital');
        $routes->post('ict-human-capital/save', 'Employee\ProposedIctStrategyController::saveIctHumanCapital');
        
        // Proposed Information Systems
        $routes->get('information-systems', 'Employee\ProposedIctStrategyController::informationSystems');
        $routes->post('information-systems/save', 'Employee\ProposedIctStrategyController::saveInformationSystems');
        
        // ICT Projects
        $routes->get('ict-projects', 'Employee\ProposedIctStrategyController::ictProjects');
        $routes->post('ict-projects/save', 'Employee\ProposedIctStrategyController::saveIctProjects');
        
        // Performance Measurement Framework
        $routes->get('performance-measurement', 'Employee\ProposedIctStrategyController::performanceMeasurement');
        $routes->post('performance-measurement/save', 'Employee\ProposedIctStrategyController::savePerformanceMeasurement');
    });
});

$routes->group('ict-planner', ['filter' => 'role:ict_planner'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'IctPlanner\DashboardController::index');

    // Resource Requirements Routes
    $routes->group(resource-requirements, static function (RouteCollection $routes)): void 
    // Main Page 
    $routes->get('/', 'IctPlanner\ResourceRequirementsController::index');

    // A.1 Year 1
    $routes->get('year1', 'IctPlanner\ResourceRequirementsController::year1');

    // A.2 Year 2
    $routes->get('year2', 'IctPlanner\ResourceRequirementsController::year2');

    // A.3 Year 3 
    $routes->get('year3', 'IctPlanner\ResourceRequirementsController::year3');

    // B. Summary of Investments
    $routes->get('summary', 'IctPlanner\ResourceRequirementsController::summary');

    // CRUD
    $routes->get('create', 'IctPlanner\ResourceRequirementsController::create');
    $routes->post('store', 'IctPlanner\ResourceRequirementsController::store');

    $routes->get('edit/(:num)', 'IctPlanner\ResourceRequirementsController::edit/$1');
    $routes->post('update/(:num)', 'IctPlanner\ResourceRequirementsController::update/$1');

    $routes->get('delete/(:num)', 'IctPlanner\ResourceRequirementsController::delete/$1');

    // Approval Workflow
    $routes->get('submit/(:num)', 'IctPlanner\ResourceRequirementsController::submitForApproval/$1');
    });
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
