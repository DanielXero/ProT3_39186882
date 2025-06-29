<?php


namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Usuario;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType       = Usuario::class;
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'rol_id',
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'baja',
        'created_at',
        'updated_at'
    ];

    // Constantes para estados
    public const ESTADO_ACTIVO = 0;
    public const ESTADO_INACTIVO = 1;

    protected $dateFormat = 'datetime';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    protected $currentUserIdForValidation = 0;
    protected $errors = [];

    /**
     * Obtiene las reglas base para actualización de usuario
     */
    protected function getBaseUpdateRules(): array
    {
        $id = $this->currentUserIdForValidation ?: 0;

        return [
            'nombre' => [
                'label' => 'Nombre',
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'El nombre es obligatorio',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres',
                    'max_length' => 'El nombre no puede exceder los 100 caracteres'
                ]
            ],
            'apellido' => [
                'label' => 'Apellido',
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'El apellido es obligatorio',
                    'min_length' => 'El apellido debe tener al menos 3 caracteres',
                    'max_length' => 'El apellido no puede exceder los 100 caracteres'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[255]|is_unique[usuarios.email,id_usuario,' . $id . ']',
                'errors' => [
                    'required' => 'El email es obligatorio',
                    'valid_email' => 'Por favor ingrese un email válido',
                    'is_unique' => 'Este email ya está registrado'
                ]
            ],
            'telefono' => [
                'label' => 'Teléfono',
                'rules' => 'permit_empty|numeric|min_length[7]|max_length[15]',
                'errors' => [
                    'numeric' => 'El teléfono debe contener solo números',
                    'min_length' => 'El teléfono debe tener al menos 7 dígitos',
                    'max_length' => 'El teléfono no puede exceder los 15 dígitos'
                ]
            ]
        ];
    }

    /**
     * Obtiene las reglas para actualización de contraseña
     */
    protected function getPasswordUpdateRules(): array
    {
        return [
            'password' => [
                'label' => 'Contraseña',
                'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres',
                    'regex_match' => 'La contraseña debe contener al menos una mayúscula, una minúscula y un número'
                ]
            ],
            'confirmPassword' => [
                'label' => 'Confirmar Contraseña',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Debes confirmar la contraseña',
                    'matches' => 'Las contraseñas no coinciden'
                ]
            ]
        ];
    }

    /**
     * Busca un usuario por su ID
     */
    public function getUserById(int $id): ?Usuario
    {
        return $this->find($id);
    }

    /**
     * Busca un usuario por su email
     */
    public function getUserByEmail(string $email): ?Usuario
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Actualiza un usuario
     */
    public function updateUser(int $id, array $data): bool
    {
        $this->currentUserIdForValidation = $id;
        $usuarioOriginal = $this->getUserById($id);

        if (!$usuarioOriginal) {
            $this->errors = ['id' => 'Usuario no encontrado.'];
            return false;
        }

        // Validación
        $validationRules = $this->getBaseUpdateRules();

        if (!empty($data['password']) || !empty($data['confirmPassword'])) {
            $validationRules = array_merge($validationRules, $this->getPasswordUpdateRules());
        }

        if (!$this->validate($data, $validationRules)) {
            $this->errors = $this->validator->getErrors();
            return false;
        }

        // Preparar datos para actualización
        $updateData = [];
        foreach ($this->allowedFields as $field) {
            // Solo actualizar campos que están presentes en $data y no son nulos
            // Excepto para password que manejaremos aparte
            if ($field !== 'password' && array_key_exists($field, $data) && $data[$field] !== null) {
                $updateData[$field] = $data[$field];
            }
        }

        // Manejar la contraseña de forma especial
        if (!empty($data['password'])) {
            // Solo actualizar contraseña si se proporciona una nueva
            $updateData['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        // Si no se proporciona password, no hacemos nada (mantenemos la existente)

        // Limpiar campos no necesarios
        unset($updateData['confirmPassword']);

        // Manejar campos vacíos
        if (isset($updateData['telefono']) && $updateData['telefono'] === '') {
            $updateData['telefono'] = null;
        }

        if (empty($updateData)) {
            return true;
        }

        // Actualizar en base de datos
        try {
            return (bool) $this->update($id, $updateData);
        } catch (\Exception $e) {
            log_message('error', 'Error al actualizar usuario: ' . $e->getMessage());
            $this->errors = ['exception' => 'Error al actualizar el usuario'];
            return false;
        }
    }

    /**
     * Crea un nuevo usuario
     */
    public function createUser(array $data): ?int
    {
        // Añadir reglas de creación si son diferentes
        $rules = array_merge($this->getBaseUpdateRules(), [
            'password' => $this->getPasswordUpdateRules()['password'],
            'confirmPassword' => $this->getPasswordUpdateRules()['confirmPassword']
        ]);

        if (!$this->validate($data, $rules)) {
            $this->errors = $this->validator->getErrors();
            return null;
        }

        // Hashear contraseña
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        unset($data['confirmPassword']);

        try {
            return $this->insert($data);
        } catch (\Exception $e) {
            log_message('error', 'Error al crear usuario: ' . $e->getMessage());
            $this->errors = ['exception' => 'Error al crear el usuario'];
            return null;
        }
    }

    /**
     * Elimina un usuario (borrado lógico)
     */
    public function deleteUser(int $id): bool
    {
        $usuario = $this->find($id);
        if (!$usuario) {
            $this->errors = ['id' => 'Usuario no encontrado.'];
            return false;
        }

        try {
            return (bool) $this->update($id, ['baja' => self::ESTADO_INACTIVO]);
        } catch (\Exception $e) {
            log_message('error', 'Error al eliminar usuario: ' . $e->getMessage());
            $this->errors = ['exception' => 'Error al eliminar el usuario'];
            return false;
        }
    }

    /**
     * Reactiva un usuario
     */
    public function restoreUser(int $id): bool
    {
        $usuario = $this->find($id);
        if (!$usuario) {
            $this->errors = ['id' => 'Usuario no encontrado.'];
            return false;
        }

        // Solo podemos restaurar si está inactivo
        if ($usuario->isActive()) {
            $this->errors = ['status' => 'El usuario ya está activo.'];
            return false;
        }

        $data = ['baja' => 0]; // Marcar como activo

        if ($this->update($id, $data)) {
            return true;
        } else {
            $this->errors = $this->db->error();
            return false;
        }
    }

    /**
     * Obtiene usuarios activos
     */
    public function getActiveUsers(): array
    {
        return $this->where('baja', self::ESTADO_ACTIVO)->findAll();
    }

    /**
     * Obtiene todos los usuarios
     */
    public function getAllUsers(): array
    {
        return $this->findAll();
    }

    /**
     * Obtiene errores
     */
    public function getErrors(): array
    {
        return $this->errors ?? [];
    }
}
