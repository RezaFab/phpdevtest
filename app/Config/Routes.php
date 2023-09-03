<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// app/Config/Routes.php

// app/Config/Routes.php

$routes->get('/', 'Auth::login');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/authenticate', 'Auth::authenticate');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/user', 'User::index');
$routes->post('/user/check_username', 'User::checkUsername');
$routes->get('/user/create', 'User::create');
$routes->post('/user/create', 'User::create');
$routes->get('/user/edit/(:num)', 'User::edit/$1');
$routes->post('/user/edit/(:num)', 'User::edit/$1');
$routes->get('/user/delete/(:num)', 'User::delete/$1');
$routes->get('/pegawai', 'Pegawai::index');
$routes->get('/pegawai/create', 'Pegawai::create');
$routes->post('/pegawai/create', 'Pegawai::create');
$routes->get('/pegawai/edit/(:num)', 'Pegawai::edit/$1');
$routes->post('/pegawai/edit/(:num)', 'Pegawai::edit/$1');
$routes->get('/pegawai/delete/(:num)', 'Pegawai::delete/$1');
