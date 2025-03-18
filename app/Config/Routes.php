<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');
$routes->get('/timetable', 'TimetableController::index/0');
$routes->get('/timetable/(:num)', 'TimetableController::index/$1');
$routes->get('/teachers', 'TeachersController::index');
$routes->get('/teacherAvailability', 'Admin\TeachersController::teacherAvailability');

$routes->group('admin', static function ($routes) {
    $routes->group('teachers', static function ($routes) {
        $routes->get('show', 'Admin\TeachersController::show');
        $routes->get('update/(:num)', 'Admin\TeachersController::update/$1');
        $routes->post('show', 'Admin\TeachersController::show');
        $routes->get('add', 'Admin\TeachersController::add');
        $routes->get('subjects/(:num)', 'Admin\TeachersController::subjects/$1');
        $routes->get('availability/(:num)', 'Admin\TeachersController::availability/$1');
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
        $routes->get('subjects/(:num)', 'Admin\YearsController::subjects/$1');
        $routes->get('add', 'Admin\YearsController::add');
        });
});

$routes->group('admin', static function ($routes) {
    $routes->group('classes', static function ($routes) {
        $routes->get('show', 'Admin\ClassesController::show');
        $routes->get('update/(:num)', 'Admin\ClassesController::update/$1');
        $routes->post('show', 'Admin\ClassesController::show');
        $routes->get('add', 'Admin\ClassesController::add');
        });
});

$routes->group('admin', static function ($routes) {
    $routes->group('subjects', static function ($routes) {
        $routes->get('show', 'Admin\SubjectsController::show');
        $routes->get('update/(:num)', 'Admin\SubjectsController::update/$1');
        $routes->post('show', 'Admin\SubjectsController::show');
        $routes->get('add', 'Admin\SubjectsController::add');
        });
});

$routes->group('admin', static function ($routes) {
    $routes->group('students', static function ($routes) {
        $routes->get('show', 'Admin\StudentsController::show');
        $routes->get('update/(:num)', 'Admin\StudentsController::update/$1');
        $routes->post('show', 'Admin\StudentsController::show');
        $routes->get('add', 'Admin\StudentsController::add');
        });
});

/* Technical */
$routes->get('/admin/setup', 'Admin\SetupController::setup');

service('auth')->routes($routes);
