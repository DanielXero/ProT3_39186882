<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class UsuarioController extends BaseController
{

    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['title'] = 'Registrarse';
        // Ahora solo retorna la vista que extiende el layout base
        return view('pages/registro', $data);
    }

    public function crear()
    {
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]',
            'apellido' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|max_length[255]|is_unique[usuarios.email]',
            'telefono' => 'permit_empty|numeric|min_length[7]|max_length[15]',
            'password' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/]',
            'confirmPassword' => 'required|matches[password]',
            'terminos' => 'required'
        ];

        $messages = [
            'nombre' => [
                'required' => 'El nombre es obligatorio',
                'min_length' => 'El nombre debe tener al menos 3 caracteres',
                'max_length' => 'El nombre no debe exceder los 100 caracteres'
            ],
            'apellido' => [
                'required' => 'El apellido es obligatorio',
                'min_length' => 'El apellido debe tener al menos 3 caracteres',
                'max_length' => 'El apellido no debe exceder los 100 caracteres'
            ],
            'email' => [
                'required' => 'El email es obligatorio',
                'valid_email' => 'Debe ingresar un email válido',
                'is_unique' => 'Este email ya está registrado',
                'max_length' => 'El email no debe exceder los 255 caracteres'
            ],
            'telefono' => [
                'numeric' => 'El teléfono solo debe contener números',
                'min_length' => 'El teléfono debe tener al menos 7 dígitos',
                'max_length' => 'El teléfono no debe exceder los 15 dígitos'
            ],
            'password' => [
                'required' => 'La contraseña es obligatoria',
                'min_length' => 'La contraseña debe tener al menos 8 caracteres',
                'regex_match' => 'La contraseña debe contener al menos una mayúscula, una minúscula y un número'
            ],
            'confirmPassword' => [
                'required' => 'Debe confirmar la contraseña',
                'matches' => 'Las contraseñas no coinciden'
            ],
            'terminos' => [
                'required' => 'Debe aceptar los términos y condiciones'
            ]
        ];

        // 1. Validar los datos del formulario
        if (!$this->validate($rules, $messages)) {
            // Si la validación falla, redirigir de vuelta al formulario con los datos y los errores.
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // 2. Si la validación es exitosa, procesar los datos
        try {
            // Instanciar el modelo de usuario
            $usuarioModel = new UsuarioModel();

            // Preparar los datos para la inserción
            $data = [
                'nombre'     => $this->request->getPost('nombre'),
                'apellido'   => $this->request->getPost('apellido'),
                'email'      => $this->request->getPost('email'),
                'telefono'   => $this->request->getPost('telefono'),
                'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'rol_id'     => 2,
                'baja'       => 0,

            ];

            // Insertar los datos en la base de datos
            if ($usuarioModel->insert($data)) {
                // Registro exitoso
                // Establecer un mensaje flash de éxito para mostrar en la siguiente petición
                session()->setFlashdata('success', '¡Tu cuenta ha sido creada con éxito! Ahora puedes iniciar sesión.');
                // Añadimos una bandera para que la vista sepa que debe mostrar el modal
                session()->setFlashdata('show_registration_modal', true);

                return redirect()->to('/login');
            } else {

                session()->setFlashdata('error', 'Hubo un error al crear tu cuenta. Por favor, inténtalo de nuevo.');
                return redirect()->back()->withInput();
            }
        } catch (DatabaseException $e) {
            // Capturar excepciones de la base de datos si ocurren durante el insert
            log_message('error', 'Error al insertar usuario: ' . $e->getMessage());
            session()->setFlashdata('error', 'Ocurrió un error inesperado al registrarte. Por favor, inténtalo más tarde.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            // Capturar cualquier otra excepción inesperada
            log_message('error', 'Error general al registrar usuario: ' . $e->getMessage());
            session()->setFlashdata('error', 'Ocurrió un error inesperado al registrarte. Por favor, inténtalo más tarde.');
            return redirect()->back()->withInput();
        }
    }
}
