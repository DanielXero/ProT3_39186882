<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class RoleAdminFilter implements FilterInterface
{
    use ResponseTrait;

    /**
     * Antes de que la solicitud llegue al controlador.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Asumimos que el filtro 'auth' ya se ha ejecutado y el usuario está logueado.
        // Aquí verificamos el rol.
        
        // Obtenemos el rol_id de la sesión.
        $rol_id = session()->get('rol_id');

        // Si el rol no es el de administrador (asumiendo que 1 es Admin)
        if ($rol_id != 1) {
            // Guardamos un mensaje de error indicando la falta de permisos.
            session()->setFlashdata('error', 'No tienes permisos suficientes para acceder a esta sección.');
            
            // Redirigimos al usuario a una página segura.
            // Puede ser la página principal, o su dashboard si tiene uno.
            return redirect()->to('/'); // O considera redirect()->to('/dashboard');
        }

        // Si el usuario es administrador, permitimos que la solicitud continúe.
        return null;
    }

    /**
     * Después de que la respuesta ha sido generada.
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No necesitamos hacer nada después de la respuesta en este filtro.
    }
}