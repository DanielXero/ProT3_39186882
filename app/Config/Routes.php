<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index'); 
$routes->get('/acerca-de', 'Pages::acercaDe');
$routes->get('/quienes-somos', 'Pages::quienesSomos');
$routes->get('/login', 'Pages::login');
$routes->get('/registro', 'Pages::registro');
$routes->get('/terminos-y-condiciones', 'Pages::terminosCondiciones');


