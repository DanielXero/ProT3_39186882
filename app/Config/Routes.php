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




// Rutas protegidas (requieren autenticación y/o roles específicos)
// Usamos un grupo con el filtro 'auth' para todas las rutas que requieran login.
$routes->group('', ['filter' => 'auth'], function($routes) {
    // Rutas de Dashboard (ejemplos)
    // Estos pueden ser dirigidos a diferentes controladores según el rol.
    // $routes->get('/dashboard', 'DashboardController::index'); // Si hay un dashboard general
    // $routes->get('/admin/dashboard', 'AdminController::dashboard');
    // $routes->get('/client/dashboard', 'ClientController::dashboard');

    // Grupo específico para administración de usuarios, que requiere AUTH y ROLE ADMIN
    $routes->group('/usuarios', ['filter' => 'roleAdmin'], function($routes) { // Aplica auth implícitamente si es un grupo padre
        $routes->get('', 'UsuarioAdminController::index'); // Listar usuarios
        $routes->get('/usuarios/editar/(:num)', 'UsuarioAdminController::editar/$1'); // Mostrar formulario de edición
        $routes->post('/usuarios/actualizar', 'UsuarioAdminController::actualizar'); // Procesar la actualización
        $routes->post('/usuarios/restaurar/(:num)', 'UsuarioAdminController::eliminar/$1'); // Procesar el borrado lógico
        $routes->post('/usuarios/eliminar/(:num)', 'UsuarioAdminController::restaurar/$1'); // Procesar la restauración
    });
});