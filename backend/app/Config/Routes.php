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
    $routes->get('view-full/(:num)', 'DirectorGeneral\DashboardController::viewFull/$1');
    $routes->get('download/(:num)', 'DirectorGeneral\DashboardController::download/$1');
    $routes->post('approve/(:num)', 'DirectorGeneral\DashboardController::approve/$1');
    $routes->post('reject/(:num)', 'DirectorGeneral\DashboardController::reject/$1');
    $routes->post('return/(:num)', 'DirectorGeneral\DashboardController::return/$1');
});

$routes->group('employee', ['filter' => 'role:employee'], static function (RouteCollection $routes): void {
    $routes->get('dashboard', 'Employee\DashboardController::index');
    $routes->post('submit-issp', 'Employee\DashboardController::submitISSP');
    $routes->post('save-draft', 'Employee\DashboardController::saveDraft');
    $routes->get('load-form-data/(:num)', 'Employee\DashboardController::loadFormData/$1');
    $routes->get('submitted-ict-projects', 'Employee\DashboardController::submittedIctProjects');
    $routes->get('draft-ict-projects', 'Employee\DashboardController::draftIctProjects');
    $routes->get('edit-ict-project/(:num)/(:any)', 'Employee\DashboardController::editIctProject/$1/$2');
    $routes->post('save-edit-draft/(:num)', 'Employee\DashboardController::saveEditDraft/$1');
    $routes->post('submit-edit-project/(:num)', 'Employee\DashboardController::submitEditProject/$1');
    $routes->post('upload-file', 'Employee\DashboardController::uploadFile');
    $routes->get('view-full-ict-document/(:num)', 'Employee\DashboardController::viewFullIctDocument/$1');
    $routes->post('resubmit-project/(:num)', 'Employee\DashboardController::resubmitProject/$1');
    
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
    $routes->get('consolidation', 'IctPlanner\ConsolidationController::index');
    $routes->post('endorse/(:num)', 'IctPlanner\DashboardController::endorse/$1');
    $routes->get('view-full/(:num)', 'IctPlanner\ConsolidationController::viewFull/$1');
    $routes->get('download/(:num)', 'IctPlanner\ConsolidationController::download/$1');
    $routes->post('download-batch', 'IctPlanner\ConsolidationController::batchDownload');

    // Agency Information Routes
    $routes->group('agency-information', static function (RouteCollection $routes): void {
        $routes->get('mandate-vision-mission', 'IctPlanner\AgencyInformationController::mandateVisionMission');
        $routes->post('mandate-vision-mission/save', 'IctPlanner\AgencyInformationController::saveMandateVisionMission');
        $routes->get('organizational-structure', 'IctPlanner\AgencyInformationController::organizationalStructure');
        $routes->post('organizational-structure/save', 'IctPlanner\AgencyInformationController::saveOrganizationalStructure');
        $routes->get('stakeholder-analysis', 'IctPlanner\AgencyInformationController::stakeholderAnalysis');
        $routes->post('stakeholder-analysis/save', 'IctPlanner\AgencyInformationController::saveStakeholderAnalysis');
        $routes->get('strategic-concerns', 'IctPlanner\AgencyInformationController::strategicConcerns');
        $routes->get('network-infrastructure', 'IctPlanner\AgencyInformationController::networkInfrastructure');
        $routes->get('information-systems-inventory', 'IctPlanner\AgencyInformationController::informationSystemsInventory');
        $routes->get('e-government-programs', 'IctPlanner\AgencyInformationController::eGovernmentPrograms');
    });

  });  

// Resource Requirements Routes
$routes->group('employee', ['filter' => 'role:employee'], static function (RouteCollection $routes): void {

    $routes->group('resource-requirements', static function (RouteCollection $routes): void {
    $routes->get('year1-requirements', 'Employee\ResourceRequirementsController::year1Requirements');
    $routes->get('year2-requirements', 'Employee\ResourceRequirementsController::year2Requirements');
    $routes->get('year3-requirements', 'Employee\ResourceRequirementsController::year3Requirements');

    $routes->get('summary-of-investments', 'Employee\ResourceRequirementsController::summaryOfInvestments');

    $routes->post('store', 'Employee\ResourceRequirementsController::store');
     $routes->post('update', 'Employee\ResourceRequirementsController::update');
    $routes->get('delete/(:num)', 'Employee\ResourceRequirementsController::delete/$1');
});
      });

$routes->group('director-general', ['filter' => 'role:director_general'], static function (RouteCollection $routes): void {
    $routes->get('pending-approval', 'DirectorGeneral\PendingApprovalController::index');
    $routes->get('approved-projects', 'DirectorGeneral\ApprovedProjectsController::index');
    $routes->post('download-batch', 'DirectorGeneral\DashboardController::batchDownload');
});

