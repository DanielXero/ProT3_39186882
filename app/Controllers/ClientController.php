<?php

namespace App\Controllers;

class ClientController extends BaseController
{
    public function __construct() {}

    /**
     * Muestra el dashboard principal para los clientes.
     */
    public function dashboard()
    {


        $data['title'] = 'Dashboard de Cliente';


        $data['clientMessage'] = '¡Bienvenido a tu espacio personal en ZhenNova!';

        // La vista del dashboard del cliente debe extender el layout base
        return view('pages/client/dashboard', $data);
    }
}
