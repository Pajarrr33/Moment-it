<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Login and register routes
$routes->get('/login','Auth::login');
$routes->get('/register','Auth::register');
$routes->get('/logout','Auth::logout');
//Validasi Login dan register
$routes->post('/valid-login','Auth::valid_login');
$routes->post('/valid-register','Auth::valid_register');

//Profile routes
$routes->get('/profile','Profile::index');



//Postingan routes 
$routes->get('/postingan' , 'Postingan::index');
$routes->get('/detail-postingan','Postingan::detail');
$routes->post('/buat-postingan','Postingan::buat');

//Upload image
$routes->post('/tmp-img','Upload::upload');
$routes->delete('/tmp-img-delete', 'Upload::cancel');
