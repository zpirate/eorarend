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
        $routes->post('update', 'Admin\TeachersController::update/1');
        $routes->get('add', 'Admin\TeachersController::add');
        $routes->post('add', 'Admin\TeachersController::add');
        $routes->get('delete/(:num)', 'Admin\TeachersController::delete/$1');
        });
});

$routes->group('admin', static function ($routes) {
    $routes->group('classrooms', static function ($routes) {
        $routes->get('show', 'Admin\ClassroomsController::show');
        $routes->get('update/(:num)', 'Admin\ClassroomsController::update/$1');
        $routes->post('update', 'Admin\ClassroomsController::update/1');
        $routes->get('add', 'Admin\ClassroomsController::add');
        $routes->post('add', 'Admin\ClassroomsController::add');
        $routes->get('delete/(:num)', 'Admin\ClassroomsController::delete/$1');
        });
});





$routes->group('admin', static function ($routes) {
    $routes->group('students', static function ($routes) {
        $routes->get('show', 'Admin\StudentsController::show');
        $routes->get('edit', 'Admin\StudentsController::edit');
        $routes->post('edit', 'Admin\StudentsController::save');
        });
});

$routes->group('admin', static function ($routes) {
    $routes->group('classes', static function ($routes) {
        $routes->get('show', 'Admin\ClassesController::show');
        $routes->get('edit', 'Admin\ClassesController::edit');
        $routes->post('edit', 'Admin\ClassesController::save');
        });
});

service('auth')->routes($routes);
