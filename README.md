# ZhenNova eCommerce - Proyecto de Backend (Tramo 3)

Este repositorio contiene el desarrollo del backend para **ZhenNova**, una plataforma de eCommerce especializada en insumos para computadoras. Este tramo se enfoca en la integración de la base de datos, la gestión de usuarios con roles y la implementación de funcionalidades clave para la administración.

## **Objetivo del Tramo 3:**

Integrar una base de datos MySQL al proyecto existente, aplicando los conceptos de Modelos, Controladores, Vistas, seguridad (hashing de contraseñas, validación), borrado lógico de usuarios, gestión de roles y sistemas de autenticación/autorización.

## **Tecnologías Utilizadas:**

*   **Framework Backend:** CodeIgniter 4
*   **Frontend:** Bootstrap 5
*   **Base de Datos:** MySQL
*   **Gestión de BD:** PHPMyAdmin
*   **Control de Versiones:** Git / GitHub

## **Estructura del Proyecto:**

El proyecto sigue una estructura organizada:
*   **`app/`**: Contiene la lógica principal de la aplicación (Modelos, Vistas, Controladores, Filtros, etc.).
    *   **`Models/`**: Implementación del `UsuarioModel` con lógica CRUD para usuarios y Entity `Usuario`.
    *   **`Controllers/`**: Controladores para páginas estáticas (`Pages`), autenticación (`UsuarioController`, `LoginController`), y administración de usuarios (`UsuarioAdminController`), así como dashboards básicos para roles (`AdminController`, `ClientController`).
    *   **`Views/`**: Toda la interfaz de usuario, organizada en `pages/` y `templates/`, y ahora con `layouts/default_layout.php` para una estructura HTML consistente.
    *   **`Filters/`**: Implementación de filtros de autenticación (`AuthFilter`) y autorización por rol (`RoleAdminFilter`).
    *   **`Entities/`**: Definición de `UsuarioEntity`.
*   **`public/`**: Archivos públicos accesibles desde el navegador (assets como CSS, JS, imágenes).
*   **`writable/`**: Directorio para archivos que la aplicación escribe (logs, cache).
*   **`database/`**: Contiene la exportación de la base de datos (`.sql`).
*   **`vendor/`**: Dependencias de Composer.
*   **`.gitignore`**: Configurado para excluir archivos sensibles y de desarrollo.
*   **`.env`**: Archivo de configuración del entorno (base de datos, claves secretas).

## **Avances Clave del Tramo 3:**

### **1. Integración de Base de Datos:**

*   **Base de Datos:** Se configuró una base de datos MySQL con las tablas `usuarios` y `roles`.
*   **Modelo de Usuario:** Se creó `UsuarioModel` para interactuar con la tabla `usuarios`, incluyendo validaciones y métodos para operaciones CRUD (agregado, edición, actualización, borrado lógico, restauración).
*   **Entity de Usuario:** Se desarrolló `UsuarioEntity` para encapsular la lógica relacionada con un usuario (ej: `getFullName()`, `isActive()`, `getRoleDescription()`).
*   **Datos de Prueba:** Se incluyó un script SQL para insertar usuarios de prueba con roles de Administrador y Cliente.

### **2. Gestión de Usuarios:**

*   **Listado de Usuarios:** Vista que muestra todos los usuarios con su estado (Activo/Inactivo).
*   **Creación de Usuarios:** Formulario de registro funcional con validación en tiempo real. Al registrarse con éxito, se muestra un modal de confirmación y se redirige al login.
*   **Edición de Usuarios:** Funcionalidad para editar los datos de un usuario existente, incluyendo la opción de actualizar la contraseña.
*   **Borrado Lógico y Restauración:** Implementación de la capacidad de marcar usuarios como inactivos (`baja = 1`) y restaurarlos (`baja = 0`) a través de modales de confirmación.

### **3. Autenticación y Autorización por Roles:**

*   **Registro y Login:** Flujo de registro y login completamente funcional.
*   **Dashboards por Rol:**
    *   Redirección inteligente post-login al dashboard correspondiente (Admin o Cliente).
    *   Navegación dinámica en el header para mostrar enlaces según el rol (ej: "Gestión de Usuarios" para Admins).
*   **Filtros de Seguridad:**
    *   `AuthFilter`: Protege rutas que requieren que el usuario esté logueado.
    *   `RoleAdminFilter`: Restringe el acceso a secciones de administración solo a usuarios con rol de Administrador.

### **4. Frontend y UX/UI:**

*   **Sistema de Layouts:** Implementado con `app/Views/layouts/main-layout.php` para una estructura HTML consistente y mantenible.
*   **Alertas Inteligentes:** Las notificaciones de éxito/error ahora se cierran automáticamente después de 5 segundos.
*   **Modales de Confirmación:** Uso de modales para las acciones de borrado y restauración de usuarios, mejorando la interacción y la prevención de acciones accidentales.
*   **Diseño Responsivo:** Se utiliza Bootstrap 5 para asegurar una experiencia adaptativa en diferentes dispositivos.

## **Instrucciones para Ejecutar el Proyecto:**

1.  **Requisitos:**
    *   PHP (con extensiones necesarias para CodeIgniter).
    *   Composer.
    *   Servidor Web (Apache, Nginx, o el servidor integrado de PHP).
    *   MySQL/MariaDB.
    *   PHPMyAdmin (o gestor similar).

2.  **Configuración del Entorno:**
    *   Copia el archivo `.env.example` a `.env`.
    *   Edita el archivo `.env` y configura los detalles de tu base de datos (`database.default.database`, `database.default.username`, `database.default.password`).
    *   Define tu clave `app.baseURL` (ej: `http://localhost:8000/` o la URL de tu proyecto).
  

3.  **Importar la Base de Datos:**
    *   Utiliza el archivo `database/sosa_gustavo` para crear las tablas y poblar la base de datos inicial (incluyendo roles y usuarios de prueba). Puedes hacerlo a través de PHPMyAdmin o la línea de comandos.

4.  **Instalar Dependencias:**
    *   En la raíz del proyecto, ejecuta: `composer install`

5.  **Ejecutar el Servidor de Desarrollo (opcional):**
    *   CodeIgniter tiene un servidor web incorporado. En la raíz del proyecto, ejecuta: `php spark serve`
    *   Luego, accede a `http://localhost:8000/` (o la dirección que indique `spark serve`) en tu navegador.

6.  **Navegar:**
    *   Accede a `http://localhost:8000/` para ver la página de inicio.
    *   Puedes registrarte, iniciar sesión (como `admin@zhennova.com` / `Admin123` o `cliente1@example.com` / `Cliente123`, usando las contraseñas de prueba que generaste), y acceder a la gestión de usuarios (si inicias sesión como admin).


---
