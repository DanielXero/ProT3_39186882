<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';  
    protected $useAutoIncrement = true; 

    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false; 
    protected $protectFields = true; 

    
    protected $allowedFields = [
        'rol_id', 'nombre', 'apellido', 'email', 'password',
        'telefono', 'baja', 'created_at', 'updated_at'
    ];

    protected $dateFormat = 'datetime'; 



    protected $useTimestamps = true; 
    protected $createdField  = 'created_at'; 

    protected $updatedField  = 'updated_at'; 

    // Validación opcional
    protected $validationRules    = []; 
    protected $validationMessages = []; 
    protected $skipValidation     = false; 
}