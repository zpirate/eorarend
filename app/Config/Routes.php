<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');
$routes->get('/timetable', 'TimetableController::index');
$routes->get('/teachers', 'TeachersController::index');

//$routes->get('/admin/teachers/edit/(:num)', 'Admin\TeachersController::edit/$1');

$routes->group('admin', static function ($routes) {
    $routes->group('teachers', static function ($routes) {
        $routes->get('show', 'Admin\TeachersController::show');
        $routes->get('update/(:num)', 'Admin\TeachersController::update/$1');
        $routes->post('show', 'Admin\TeachersController::show');
        $routes->get('add', 'Admin\TeachersController::add');
        });
});

$routes->group('admin', static function ($routes) {
    $routes->group('classrooms', static function ($routes) {
        $routes->get('show', 'Admin\ClassroomsController::show');
        $routes->get('update/(:num)', 'Admin\ClassroomsController::update/$1');
        $routes->post('show', 'Admin\ClassroomsController::show');
        $routes->get('add', 'Admin\ClassroomsController::add');
        });
});

$routes->group('admin', static function ($routes) {
    $routes->group('years', static function ($routes) {
        $routes->get('show', 'Admin\YearsController::show');
        $routes->get('update/(:num)', 'Admin\YearsController::update/$1');
        $routes->post('show', 'Admin\YearsController::show');
        $routes->get('add', 'Admin\YearsController::add');
        });
});


service('auth')->routes($routes);
