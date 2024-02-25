<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->match(['get', 'post'],'/','Home::index');
$routes->post('/get-more-postingan','Home::getmore');
$routes->post('/get-more-search','Home::getmoresearch');

//Login and register routes
$routes->get('/login','Auth::login');
$routes->get('/register','Auth::register');
$routes->get('/logout','Auth::logout');
$routes->get('/verification','Auth::email_validation');
$routes->get('/verification/(:any)','Auth::verification/$1');

//Validasi Login dan register
$routes->post('/valid-login','Auth::valid_login');
$routes->post('/valid-register','Auth::valid_register');

//Profile routes
$routes->get('/profile/(:any)','Profile::profile/$1');
$routes->get('/edit-profile/(:any)','Profile::edit/$1');
$routes->post('/update-profile/(:any)','Profile::update/$1');
$routes->get('/delete-profile/(:any)','Profile::delete/$1');
$routes->get('/album/(:any)/(:any)','Profile::user_album/$1/$2');


//Postingan routes 
$routes->get('/postingan' , 'Postingan::index');
$routes->post('/buat-postingan','Postingan::create');
$routes->get('/edit-postingan/(:any)','Postingan::edit/$1');
$routes->post('/update-postingan/(:any)','Postingan::update/$1');
$routes->get('/delete-postingan/(:any)','Postingan::delete/$1');
$routes->get('/detail-postingan/(:any)','Postingan::detail/$1');

//Like routes
$routes->get('/add-like/(:any)','Like::add/$1');
$routes->get('/remove-like/(:any)/(:any)','Like::remove/$1/$2');

//Comment Routes 
$routes->post('/add-comment/(:any)','Comment::create/$1');
$routes->post('/edit-comment/(:any)/(:any)','Comment::update/$1/$2');
$routes->get('/remove-comment/(:any)/(:any)','Comment::delete/$1/$2');

//Album Routes 
$routes->post('/add-album/(:any)','Album::add_album/$1');
$routes->post('/update-album/(:any)','Album::update_album/$1');
$routes->get('/delete-album/(:any)','Album::delete_album/$1');
$routes->get('/add-album-items/(:any)/(:any)','Album::add_items/$1/$2');
$routes->get('/remove-album-items/(:any)/(:any)','Album::remove_items/$1/$2');

//Upload image
$routes->post('/tmp-img','Upload::upload');
$routes->delete('/tmp-img-delete', 'Upload::cancel');
