<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class LoginController extends BaseController
{
    public function __construct()
    {

        helper(['form', 'url']);
    }

    /**
     * Muestra la vista del formulario de login.
     * Si el usuario ya está logueado, lo redirige al dashboard.
     */
    public function index()
    {
        
        if (session()->get('isLoggedIn')) {

            return redirect()->to('/dashboard');
        }


        $data['title'] = 'Iniciar Sesión';
        // Ahora solo retorna la vista que extiende el layout base
        return view('pages/login', $data);
    }

    /**
     * Procesa la autenticación del usuario.
     */
    public function auth()
    {
        // 1. Definir las reglas de validación para los campos del login
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        // 2. Definir los mensajes personalizados para las reglas de validación
        $messages = [
            'email' => [
                'required'    => 'El email es obligatorio',
                'valid_email' => 'Debe ingresar un email válido',
            ],
            'password' => [
                'required' => 'La contraseña es obligatoria',
            ],
        ];

        // 3. Ejecutar la validación
        if (!$this->validate($rules, $messages)) {
            // Si la validación falla, redirigir de vuelta al formulario de login
            // con los errores y los datos ingresados para que el usuario pueda corregir.
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 4. Si la validación es exitosa, intentar autenticar al usuario
        try {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usuarioModel = new UsuarioModel();
            // Buscar al usuario por su email
            $usuario = $usuarioModel->where('email', $email)->first(); //

            // Verificar si el usuario existe y si la contraseña es correcta
            if ($usuario && password_verify($password, $usuario->password)) {
                // Verificar si el usuario no está dado de baja (si 'baja' = 0 significa activo)
                // Usamos 0 para activo y 1 para dado de baja, como se definió en el controlador de registro.
                if ($usuario->baja == 1) { //
                    session()->setFlashdata('error', 'Tu cuenta ha sido desactivada. Contacta al administrador.');
                    return redirect()->back()->withInput();
                }

                // 5. Autenticación exitosa: Establecer la sesión del usuario
                $sessionData = [
                    'id_usuario' => $usuario->id_usuario,
                    'nombre'     => $usuario->nombre, 
                    'apellido'   => $usuario->apellido, 
                    'email'      => $usuario->email, 
                    'rol_id'     => $usuario->rol_id, 
                    'isLoggedIn' => true,
                ];
                session()->set($sessionData); // Guarda los datos en la sesión

                // Establecer un mensaje flash de éxito
                session()->setFlashdata('success', '¡Bienvenido de nuevo, ' . $usuario->nombre . '!');


                return redirect()->to('/');
            } else {
                // 6. Credenciales inválidas
                session()->setFlashdata('error', 'Email o contraseña incorrectos.');
                return redirect()->back()->withInput(); // Vuelve al login con los datos
            }
        } catch (DatabaseException $e) {
            // Captura errores específicos de la base de datos
            log_message('error', 'Error de base de datos durante el login: ' . $e->getMessage());
            session()->setFlashdata('error', 'Ocurrió un error inesperado al intentar iniciar sesión. Por favor, inténtalo de nuevo más tarde.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            // Captura cualquier otra excepción general
            log_message('error', 'Error general durante el login: ' . $e->getMessage());
            session()->setFlashdata('error', 'Ocurrió un error inesperado. Por favor, inténtalo de nuevo.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout()
    {
        // Destruir todos los datos de la sesión
        session()->destroy();


        session()->setFlashdata('success', 'Has cerrado sesión correctamente.');


        return redirect()->to('/login');
    }
}
