<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/acerca-de', 'Pages::acercaDe');
$routes->get('/quienes-somos', 'Pages::quienesSomos');
$routes->get('/terminos-y-condiciones', 'Pages::terminosCondiciones');


/* Ruta del registro del usuario */
$routes->get('/registro', 'UsuarioController::index'); // Muestra el formulario de registro
$routes->post('/registro', 'UsuarioController::crear'); // Procesa el registro


// Ruta del Login

$routes->get('/login', 'LoginController::index'); // Muestra el formulario de login
$routes->post('/login/auth', 'LoginController::auth'); // Procesa el login
$routes->get('/logout', 'LoginController::logout'); // Ruta para cerrar sesión


// Rutas de Gestión de Usuarios
// Asegúrate de que esta ruta se llame ANTES de las rutas GET/POST generales si hay conflicto.
// O simplemente asegúrate de que el controlador de administración sea el que maneje /usuarios.
$routes->get('/usuarios', 'UsuarioAdminController::index'); // Listar usuarios

$routes->get('/usuarios/editar/(:num)', 'UsuarioAdminController::editar/$1'); // Mostrar formulario de edición
$routes->post('/usuarios/actualizar', 'UsuarioAdminController::actualizar'); // Procesar la actualización
$routes->post('/usuarios/restaurar/(:num)', 'UsuarioAdminController::restaurar/$1');
$routes->post('/usuarios/eliminar/(:num)', 'UsuarioAdminController::eliminar/$1'); // Procesar el borrado lógico