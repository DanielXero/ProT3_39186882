<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait; // Útil para respuestas API, pero aquí principalmente para redirigir

class AuthFilter implements FilterInterface
{
    use ResponseTrait; // Para poder usar redirigir, etc.

    /**
     * Antes de que la solicitud llegue al controlador.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificamos si el usuario está logueado.
        // Usamos session()->get('isLoggedIn') que establecimos en LoginController.
        if (!session()->get('isLoggedIn')) {
            // Si no está logueado, guardamos un mensaje flash indicando por qué fue redirigido.
            session()->setFlashdata('error', 'Debes iniciar sesión para acceder a esta área.');
            // Redirigimos a la página de login.
            return redirect()->to('/login');
        }

        // Si el usuario está logueado, permitimos que la solicitud continúe.
        return null;
    }

    /**
     * Después de que la respuesta ha sido generada.
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // En este filtro de autenticación, no necesitamos hacer nada después de la respuesta.
    }
}