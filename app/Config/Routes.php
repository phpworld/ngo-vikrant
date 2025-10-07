<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Main Website Routes
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/beti-vivah', 'Home::betiVivah');
$routes->get('/death-help', 'Home::deathHelp');
$routes->get('/education-help', 'Home::educationHelp');
$routes->get('/rulebook', 'Home::ruleBook');
$routes->get('/contact', 'Home::contact');

// Authentication Routes
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::processRegister');
$routes->get('/logout', 'Auth::logout');
$routes->get('/forgot-password', 'Auth::forgotPassword');
$routes->post('/forgot-password', 'Auth::processForgotPassword');

// Admin Routes
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::dashboard');
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('users', 'Admin::users');
    $routes->get('applications', 'Admin::applications');
    $routes->get('application-details/(:num)', 'Admin::applicationDetails/$1');
    $routes->post('update-application-status', 'Admin::updateApplicationStatus');
    $routes->post('process-application-action', 'Admin::processApplicationAction');
    $routes->get('reports', 'Admin::reports');
    $routes->get('settings', 'Admin::settings');
    $routes->get('delete-user/(:num)', 'Admin::deleteUser/$1');
    $routes->get('toggle-user-status/(:num)', 'Admin::toggleUserStatus/$1');
});

// Member Routes
$routes->group('member', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Member::dashboard');
    $routes->get('dashboard', 'Member::dashboard');
    $routes->get('profile', 'Member::profile');
    $routes->post('update-profile', 'Member::updateProfile');
    $routes->get('applications', 'Member::applications');
    $routes->get('apply-vivah-help', 'Member::applyVivahHelp');
    $routes->post('apply-vivah-help', 'Member::processVivahApplication');
    $routes->get('apply-death-help', 'Member::applyDeathHelp');
    $routes->post('apply-death-help', 'Member::processDeathApplication');
});
