<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/formToken', 'Home::createToken');

$routes->get('/', 'CreateToken::create_function');

//Virtual Account
$routes->get('/inquiry', 'InquiryVA::status_va');
$routes->get('/createva', 'CreateVA::create_function');

//Ewallet
$routes->get('/createewallet', 'CreateEwallet::generate_ewallet');
$routes->get('/inquiryewallet', 'InquiryEwallet::status_ewallet');
$routes->get('/refundewallet', 'RefundEwallet::refund_ewallet');