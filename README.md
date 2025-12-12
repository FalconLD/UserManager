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


git clone [URL_DE_TU_REPOSITORIO]
cd [name_project]
 
## 2. Configuración del Entorno

Debes configurar la clave de seguridad y la conexión a la base de datos.Crear el archivo .env: Copia la plantilla de configuración.Bashcp .env.example .env
Generar la Clave de Aplicación:Bashphp artisan key:generate
Configurar PostgreSQL: Abre el archivo .env y ajusta las variables de conexión a tu servidor local de PostgreSQL.Fragmento de códigoDB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=user_management_db 
DB_USERNAME=postgres
DB_PASSWORD=tu_contraseña_secreta 
3. Instalar DependenciasInstala las dependencias de PHP y JavaScript/CSS:Bashcomposer install
npm install
4. Ejecutar Base de Datos (Migraciones y Seeders)Ejecuta las migraciones para crear las tablas y luego inserta el usuario administrador de prueba.Ejecutar Migraciones: Crea la tabla users y las tablas de autenticación.Bashphp artisan migrate
Ejecutar Seeder de Administrador: Inserta el usuario por defecto.Bashphp artisan db:seed --class=AdminUserSeeder
(Ver las credenciales del Seeder en la sección de Usuarios de Prueba).▶️ Ejecución del ProyectoPara correr la aplicación, debes tener dos terminales abiertas:Terminal 1: Servidor de Backend (Laravel)Bashphp artisan serve
Terminal 2: Compilador de Frontend (Vite)NOTA: Mantén este comando corriendo. Si lo cierras, los estilos de Tailwind CSS no se cargarán.Bashnpm run dev
Una vez que ambos servidores estén activos, puedes acceder a la aplicación en http://127.0.0.1:8000.👤 Usuarios de PruebaPara acceder a la funcionalidad de administración, inicia sesión con el usuario creado por el Seeder:RolCorreo ElectrónicoContraseñaAdministradoradmin@example.compasswordLa gestión de usuarios CRUD se encuentra en la ruta /users (solo accesible después de iniciar sesión).📚 Notas Adicionales (Referencia de Desarrollo)Aquí se listan los comandos clave utilizados para la construcción de este proyecto.Comando/TareaPropósitophp artisan breeze:installInstalación del scaffolding de Login/Registro/Vistas.php artisan make:controller UserController --resourceCreación del controlador con los 7 métodos CRUD.php artisan make:seeder AdminUserSeederCreación del archivo para insertar el usuario administrador.Protección de RutasLa ruta Route::resource('users', ...) está envuelta en el middleware auth para redirigir al Login.
---