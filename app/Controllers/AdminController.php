<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function __construct() {}

    /**
     * Muestra el dashboard principal para los administradores.
     */
    public function dashboard()
    {


        $data['title'] = 'Dashboard de Administrador';


        $data['adminMessage'] = '¡Bienvenido al Panel de Administración!';


        return view('pages/admin/dashboard', $data);
    }
}
