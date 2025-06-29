<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index'); 
$routes->get('/acerca-de', 'Pages::acercaDe');
$routes->get('/quienes-somos', 'Pages::quienesSomos');
$routes->get('/login', 'Pages::login');

$routes->get('/terminos-y-condiciones', 'Pages::terminosCondiciones');


/* Ruta del registro del usuario */
$routes->get('/registro', 'UsuarioController::index'); // Muestra el formulario de registro
$routes->post('/registro', 'UsuarioController::crear'); // Procesa el registro


// Ruta del Login

$routes->get('/login', 'LoginController::index'); // Muestra el formulario de login
$routes->post('/login/auth', 'LoginController::auth'); // Procesa el login
$routes->get('/logout', 'LoginController::logout'); // Ruta para cerrar sesión