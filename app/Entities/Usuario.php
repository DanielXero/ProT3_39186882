<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuario extends Entity
{
    protected $dates = ['created_at', 'updated_at'];
    protected $casts = []; // Aquí puedes castear tipos si es necesario, ej: 'password' => 'hashed'

    // Getter para el nombre completo
    public function getFullName()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    // Getter para verificar si está activo (0 = Activo, 1 = Inactivo)
    public function isActive()
    {
        return $this->baja == 0;
    }

    // Getter para obtener una descripción básica del rol (asumiendo que solo hay Admin/Cliente)
    public function getRoleDescription()
    {
        // Esto es una simplificación. Idealmente, obtendrías esto de una tabla de roles.
        switch ($this->rol_id) {
            case 1: return 'Admin';
            case 2: return 'Cliente';
            default: return 'Desconocido';
        }
    }

    
}