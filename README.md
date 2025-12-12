# 💻 Gestión de Usuarios (CRUD - Laravel con Breeze)

Proyecto desarrollado para la gestión administrativa de usuarios, implementando autenticación (Login/Registro) con Laravel Breeze y una interfaz CRUD completa para administradores, utilizando PostgreSQL como base de datos.

## 🌟 Características Principales

* **Tecnología:** Laravel 11+
* **Base de Datos:** PostgreSQL
* **Frontend:** Blade & Tailwind CSS (con Vite)
* **Seguridad:** Autenticación completa (Login, Registro, Recuperación de Contraseña) y protección CSRF.
* **Administración:** CRUD completo para la entidad `User` (`/users`).

---

## 🛠️ Requisitos del Sistema

Asegúrate de tener instalado el siguiente software antes de comenzar:

* **PHP:** Versión 8.2 o superior
* **Composer:** Última versión estable
* **Node.js & npm:** (Para la compilación de Tailwind CSS)
* **PostgreSQL:** Servidor de base de datos operativo.

---

## 🚀 Guía de Instalación y Configuración

Sigue estos pasos para poner la aplicación en funcionamiento en tu entorno local.

### 1. Clonar el Repositorio

Si aún no tienes el proyecto, clónalo desde GitHub:

```bash
git clone [URL_DE_TU_REPOSITORIO]
cd [name_project] 
````

### 2\. Configuración del Entorno

Debes configurar la clave de seguridad y la conexión a la base de datos.

1.  **Crear el archivo `.env`:** Copia la plantilla de configuración.
    ```bash
    cp .env.example .env
    ```
2.  **Generar la Clave de Aplicación:**
    ```bash
    php artisan key:generate
    ```
3.  **Configurar PostgreSQL:** Abre el archivo `.env` y ajusta las variables de conexión a tu servidor local de PostgreSQL (Host, Puerto, Base de Datos, Usuario y Contraseña).

### 3\. Instalar Dependencias

Instala las dependencias de PHP y JavaScript/CSS:

```bash
composer install
npm install
```

### 4\. Ejecutar Base de Datos (Migraciones y Seeders)

Ejecuta las migraciones para crear las tablas y luego inserta el usuario administrador de prueba.

1.  **Ejecutar Migraciones:** Crea la tabla `users` y las tablas de autenticación.
    ```bash
    php artisan migrate
    ```
2.  **Ejecutar Seeder de Administrador:** Inserta el usuario por defecto.
    ```bash
    php artisan db:seed --class=AdminUserSeeder
    ```
    *(Ver las credenciales del Seeder en la sección de **Usuarios de Prueba**).*

-----

## ▶️ Ejecución del Proyecto

Para correr la aplicación, debes tener dos terminales abiertas:

### Terminal 1: Servidor de Backend (Laravel)

```bash
php artisan serve
```

### Terminal 2: Compilador de Frontend (Vite)

> **NOTA:** Mantén este comando corriendo. Si lo cierras, los estilos de Tailwind CSS no se cargarán.

```bash
npm run dev
```

Una vez que ambos servidores estén activos, puedes acceder a la aplicación en `http://127.0.0.1:8000`.

-----

## 👤 Usuarios de Prueba 

Para acceder a la funcionalidad de administración, inicia sesión con el usuario creado por el Seeder:

| Rol | Correo Electrónico | Contraseña |
| :--- | :--- | :--- |
| **Administrador** | `admin@example.com` | `password` |

La gestión de usuarios CRUD se encuentra en la ruta `/users` (solo accesible después de iniciar sesión).

-----

## 📚 Notas Adicionales (Referencia de Desarrollo)

Aquí se listan los comandos clave utilizados para la construcción de este proyecto.

| Comando/Tarea | Propósito |
| :--- | :--- |
| `php artisan breeze:install` | Instalación del *scaffolding* de Login/Registro/Vistas. |
| `php artisan make:controller UserController --resource` | Creación del controlador con los 7 métodos CRUD. |
| `php artisan make:seeder AdminUserSeeder` | Creación del archivo para insertar el usuario administrador. |
| **Protección de Rutas** | La ruta `Route::resource('users', ...)` está envuelta en el *middleware* `auth` para redirigir al Login. |
