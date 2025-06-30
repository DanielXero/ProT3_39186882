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
$routes->group('', ['filter' => 'auth'], function ($routes) {
    // Dashboard específico para Cliente
    $routes->get('/client/dashboard', 'ClientController::dashboard');

    // Grupo específico para administración de usuarios
    
    $routes->group('/usuarios', ['filter' => 'roleAdmin'], function ($routes) {
        $routes->get('', 'UsuarioAdminController::index'); // Ruta: /usuarios
        // ¡CORREGIDO! Eliminamos el prefijo '/usuarios' repetido
        $routes->get('editar/(:num)', 'UsuarioAdminController::editar/$1'); // Ruta: /usuarios/editar/{id}
        $routes->post('actualizar', 'UsuarioAdminController::actualizar'); // Ruta: /usuarios/actualizar
        $routes->post('eliminar/(:num)', 'UsuarioAdminController::eliminar/$1'); // Ruta: /usuarios/eliminar/{id}
        $routes->post('restaurar/(:num)', 'UsuarioAdminController::restaurar/$1'); // Ruta: /usuarios/restaurar/{id}
    });

    // Dashboard específico para Administrador
    $routes->get('/admin/dashboard', 'AdminController::dashboard');
});
