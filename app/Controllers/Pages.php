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
         $data['title'] = 'Inicio';
        // Ahora solo se retorna la vista que extiende el layout base
        return view('pages/home', $data);
    }

    /**
     * Muestra la página "Acerca de"
     */
    public function acercaDe()
    {
       $data['title'] = 'Acerca de Nosotros';
        return view('pages/acerca-de', $data);
    }

    /**
     * Muestra la página "¿Quiénes somos?"
     */
    public function quienesSomos()
    {
       $data['title'] = '¿Quiénes Somos?';
        return view('pages/quienes-somos', $data);
    }


        /**
     * Muestra la página de terminos y condiciones
     */
    public function terminosCondiciones()
    {
        $data['title'] = 'Terminos y Condiciones';
        return view('pages/terminos-y-condiciones', $data);
    }
}
