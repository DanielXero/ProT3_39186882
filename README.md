# 🛒 ZhenNova eCommerce — Proyecto de Backend *(Tramo 3)*

Este repositorio contiene el desarrollo del backend para **ZhenNova**, una plataforma de eCommerce especializada en insumos para computadoras.  
En este tramo se integran la base de datos, la gestión de usuarios con roles y funcionalidades clave para la administración del sistema.

---

## 🎯 Objetivo del Tramo 3

> Integrar una base de datos **MySQL** al proyecto existente, aplicando conceptos como:
- Modelos, Controladores y Vistas (MVC)
- Seguridad (hashing de contraseñas, validación)
- Borrado lógico de usuarios
- Gestión de roles
- Autenticación y autorización de usuarios

---

## 🛠️ Tecnologías Utilizadas

| Componente              | Herramienta         |
|-------------------------|---------------------|
| 🧠 Framework Backend     | CodeIgniter 4       |
| 🎨 Frontend             | Bootstrap 5         |
| 🗄️ Base de Datos         | MySQL               |
| ⚙️ Gestión de BD         | PHPMyAdmin          |
| 🔄 Control de Versiones | Git / GitHub        |

---

## 🗂️ Estructura del Proyecto

```text
app/
├── Models/            → UsuarioModel, UsuarioEntity
├── Controllers/       → Pages, LoginController, UsuarioController, UsuarioAdminController, etc.
├── Views/             → pages/, templates/, layouts/
├── Filters/           → AuthFilter, RoleAdminFilter
├── Entities/          → UsuarioEntity

public/                → Archivos accesibles: CSS, JS, imágenes
writable/              → Logs, cache, archivos generados
database/              → Exportación SQL
.gitignore             → Exclusión de archivos sensibles
.env                   → Configuración de entorno
```

---

## 🚀 Avances Clave del Tramo 3

### 🔗 1. Integración de Base de Datos
- Configuración de una base MySQL con tablas `usuarios` y `roles`.
- `UsuarioModel` con validaciones y métodos CRUD (alta, baja lógica, edición).
- `UsuarioEntity` con lógica encapsulada: `getFullName()`, `isActive()`, etc.
- Script de prueba con usuarios **Admin** y **Cliente**.

---

### 👥 2. Gestión de Usuarios
- **Listado de Usuarios:** Visualización con estado Activo/Inactivo.
- **Formulario de Registro:** Validación en tiempo real + modal de confirmación.
- **Edición de Usuario:** Edición de datos + opción para actualizar contraseña.
- **Borrado lógico y restauración:** Con modales de confirmación.

---

### 🔐 3. Autenticación y Autorización por Roles
- **Login y Registro funcionales**
- Redirección automática al **dashboard correspondiente** según el rol.
- Navegación dinámica basada en el rol (Admin o Cliente).
- Filtros:
  - `AuthFilter`: Protege rutas privadas.
  - `RoleAdminFilter`: Acceso restringido a secciones administrativas.
- Loguearse -> Como Administrador
   - Correo: Perez@gmail.com
   - Contraseña: Admin12345
- Loguearse -> Como Cliente
   - Correo: juan.perez@example.com
   - Contraseña: Cliente123

---

### 💡 4. Frontend y UX/UI
- Layout principal en `main-layout.php` para consistencia HTML.
- **Alertas automáticas** que se cierran tras 5 segundos.
- **Modales de confirmación** para acciones sensibles.
- **Diseño responsivo** mediante Bootstrap 5.

---

## ⚙️ Instrucciones para Ejecutar el Proyecto

### ✅ Requisitos Previos

- PHP (con extensiones requeridas por CodeIgniter)
- Composer
- Servidor Web (Apache, Nginx o PHP integrado)
- MySQL / MariaDB
- PHPMyAdmin (opcional)

---

### 📄 1. Configurar Entorno

```bash
cp .env.example .env
```

- Editar el archivo `.env` con tus datos:
  - `database.default.database`
  - `database.default.username`
  - `database.default.password`
  - `app.baseURL` (ej: http://localhost:8000/)

---

### 🧩 2. Importar la Base de Datos

- Importar el archivo `database/sosa_gustavo.sql` desde **PHPMyAdmin** o línea de comandos.
- Incluye usuarios de prueba y configuración básica.

---

### 📦 3. Instalar Dependencias

```bash
composer install
```

---

### 🧪 4. Ejecutar Servidor de Desarrollo

```bash
php spark serve
```

- Acceder en el navegador:
  - 👉 http://localhost:8000/

---

## 👨‍💻 Autor

**Sosa Gustavo Daniel**  
Proyecto académico para el Tramo 3 de Backend - ZhenNova eCommerce

---

## 📜 Licencia

Este proyecto está bajo la licencia MIT.  
Puedes utilizarlo, modificarlo y distribuirlo libremente con fines educativos o comerciales.
