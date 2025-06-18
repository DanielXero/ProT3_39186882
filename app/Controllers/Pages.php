<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    /**
     * Carga la página principal (home)
     */
    public function index()
    {
        // Pasamos un título dinámico a la vista
        $data['title'] = 'Inicio';

        return view('templates/header', $data) .
            view('pages/home') .
            view('templates/footer');
    }

    /**
     * Muestra la página "Acerca de"
     */
    public function acercaDe()
    {
        $data['title'] = 'Acerca de Nosotros';

        return view('templates/header', $data) .
            view('pages/acerca-de') .
            view('templates/footer');
    }

    /**
     * Muestra la página "¿Quiénes somos?"
     */
    public function quienesSomos()
    {
        $data['title'] = '¿Quiénes Somos?';

        return view('templates/header', $data) .
            view('pages/quienes-somos') .
            view('templates/footer');
    }

    /**
     * Muestra el formulario de login
     */
    public function login()
    {
        $data['title'] = 'Iniciar Sesión';

        return view('templates/header', $data) .
            view('pages/login') .
            view('templates/footer');
    }

    /**
     * Muestra el formulario de registro
     */
    public function registro()
    {
        $data['title'] = 'Registrarse';

        return view('templates/header', $data) .
            view('pages/registro') .
            view('templates/footer');
    }

        /**
     * Muestra el formulario de registro
     */
    public function terminosCondiciones()
    {
        $data['title'] = 'Terminos y Condiciones';

        return view('templates/header', $data) .
            view('pages/terminos-y-condiciones') .
            view('templates/footer');
    }
}
