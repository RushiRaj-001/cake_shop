<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */     
$routes->get('/', 'Home::home');

$routes->get('/login', 'Home::login');
$routes->post('/login', 'Home::login');

$routes->get('/logout', 'Home::logout');

$routes->get('/shop', 'Home::shop');

$routes->get('/addToCart', 'ProductController::addToCart');
$routes->post('/addToCart', 'ProductController::addToCart');
$routes->get('/decrement', 'ProductController::decrement');
$routes->post('/decrement', 'ProductController::decrement');
$routes->post('/removeItem', 'ProductController::removeItem');
$routes->post('/removeItem', 'ProductController::removeItem');

$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::register');

$routes->get('/cart', 'ProductController::cart',['filter' => 'isLogin']);


$routes->get('/admin_dashboard', 'AdminController::admin_dashboard',['filter' => 'isAdmin']);
$routes->get('/customer', 'AdminController::customer',['filter' => 'isAdmin']);
$routes->get('/category', 'AdminController::category',['filter' => 'isAdmin']);
$routes->get('/add_product', 'AdminController::add_product',['filter' => 'isAdmin']);
$routes->post('/add_product', 'AdminController::add_product',['filter' => 'isAdmin']);
$routes->get('/product', 'ProductController::product',['filter' => 'isAdmin']);
$routes->post('/product-store', 'ProductController::store',['filter' => 'isAdmin']);
$routes->get('/product/edit/(:num)','ProductController::edit/$1',['filter' => 'isAdmin']);
$routes->post('/product/update/(:num)','ProductController::update/$1',['filter' => 'isAdmin']);

$routes->get('/product/delete/(:num)','ProductController::delete/$1',['filter' => 'isAdmin']);