<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


//Postingan routes 
$routes->get('/postingan' , 'Postingan::index');

//Upload image
$routes->post('/tmp-img','Upload::upload');