<?php

namespace App\Controllers;

use App\Models\UsuarioModel; // Necesitas el modelo
use App\Entities\Usuario;   // Necesitas la Entity si la usas

class UsuarioAdminController extends BaseController
{
    protected $usuarioModel; // Instancia del modelo

    public function __construct()
    {
        
        helper(['form', 'url']); // Cargamos helpers necesarios
        $this->usuarioModel = new UsuarioModel(); // Inicializamos el modelo
    }

    /**
     * Muestra el listado de todos los usuarios.
     */
    public function index()
    {
        $data['title'] = 'Gestión de Usuarios';
        // Obtener todos los usuarios (incluyendo inactivos si queremos listarlos todos)
        // Si quieres solo activos, usa $this->usuarioModel->getActiveUsers();
        $data['usuarios'] = $this->usuarioModel->getAllUsers(); // Usamos el método para obtener todos los usuarios

        // Pasamos las vistas que ya extienden el layout base
        return view('pages/usuarios/listado', $data);
    }

    /**
     * Muestra el formulario para editar un usuario.
     */
    public function editar($id = null)
    {
        $data['title'] = 'Editar Usuario';
        $usuario = $this->usuarioModel->getUserById($id); // Usamos el método del modelo

        if (!$usuario) {
            // Usuario no encontrado
            session()->setFlashdata('error', 'Usuario no encontrado.');
            return redirect()->to('/usuarios');
        }

        // Pasamos el usuario a la vista para pre-llenar el formulario
        $data['usuario'] = $usuario;

        // La vista de edición necesitará ser creada
        return view('pages/usuarios/editar', $data);
    }

    /**
     * Procesa la actualización de un usuario.
     */
    public function actualizar()
    {
        // Recibimos los datos del formulario de edición
        $id = $this->request->getPost('id_usuario'); // Asumimos que el ID se envía en el formulario

        // Preparamos los datos del POST, excluyendo campos que no deben ser modificados directamente por el formulario
        $data = $this->request->getPost();

        // La validación y hashing de password se manejan dentro del método updateUser del modelo si se proporcionan
        // Validamos los datos usando el modelo
        if (!$this->usuarioModel->updateUser($id, $data)) {
            // Si la actualización falla (por validación o BD), volvemos al formulario
            // con los errores y los datos de entrada.
            // Guardamos los errores del modelo para poder mostrarlos
            $errors = $this->usuarioModel->getErrors();
            // Si el error es por email duplicado, asegúrate de que el mensaje sea claro.
            // El método updateUser ya tiene la validación específica para el email único.

            // Pasamos el usuario a la vista para que el formulario se pre-llene de nuevo
            // Obtenemos el usuario original para poder mostrar los datos que no cambiaron o que el usuario intentó actualizar
            $usuario = $this->usuarioModel->find($id); // Buscamos el usuario para pasarlo a la vista de edición
            if ($usuario) {
                // Combinamos los datos ingresados con los datos originales, dando prioridad a los ingresados
                $data_to_view = array_merge((array)$usuario, $data); // Convertimos la Entity a array si es necesario para merge
                $data['usuario'] = (object) $data_to_view; // Pasamos como objeto
            }

            session()->setFlashdata('errors', $errors); // Establecemos los errores de validación
            return redirect()->back()->withInput()->with('errors', $errors); // Redirigimos de vuelta con los errores y datos de entrada
        }

        // Si la actualización fue exitosa
        session()->setFlashdata('success', 'Usuario actualizado con éxito.');
        return redirect()->to('/usuarios'); // Redirigimos al listado de usuarios
    }

    /**
     * Procesa la eliminación (borrado lógico) de un usuario.
     */
    public function eliminar($id = null)
    {
        // El ID se pasa por la URL en el enlace del botón "Eliminar"
        if ($id === null) {
            session()->setFlashdata('error', 'ID de usuario no proporcionado.');
            return redirect()->to('/usuarios');
        }

        // Usamos el método del modelo para marcar el usuario como baja
        if ($this->usuarioModel->deleteUser($id)) {
            session()->setFlashdata('success', 'Usuario marcado como inactivo con éxito.');
        } else {
            session()->setFlashdata('error', 'Error al marcar el usuario como inactivo: ' . implode(', ', $this->usuarioModel->getErrors()));
        }

        return redirect()->to('/usuarios');
    }

     /**
     * Procesa la restauración de un usuario (lo marca como activo).
     */
    public function restaurar($id = null)
    {
        if ($id === null) {
            session()->setFlashdata('error', 'ID de usuario no proporcionado.');
            return redirect()->to('/usuarios');
        }

        if ($this->usuarioModel->restoreUser($id)) {
            session()->setFlashdata('success', 'Usuario restaurado con éxito.');
        } else {
            // Capturamos el mensaje de error del modelo si lo hubiera
            $errors = $this->usuarioModel->getErrors();
            $errorMessage = 'Error al restaurar el usuario.';
            if (!empty($errors)) {
                 // Buscamos el mensaje de error específico si existe
                if(isset($errors['status'])) $errorMessage = $errors['status'];
                elseif(isset($errors['id'])) $errorMessage = $errors['id'];
                elseif(isset($errors[0])) $errorMessage = $errors[0]; // Error genérico si es un array
            }
            session()->setFlashdata('error', $errorMessage);
        }

        return redirect()->to('/usuarios');
    }
}