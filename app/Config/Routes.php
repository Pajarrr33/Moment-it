<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Login and register routes
$routes->get('/login','Auth::login');
$routes->get('/register','Auth::register');


//Postingan routes 
$routes->get('/postingan' , 'Postingan::index');
$routes->post('/buat-postingan','Postingan::buat');

//Upload image
$routes->post('/tmp-img','Upload::upload');
$routes->delete('/tmp-img-delete', 'Upload::cancel');
