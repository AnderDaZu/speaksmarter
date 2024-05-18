# Sección de usuarios
En esta ocasión se configuro primeramente el entorno para trabajar tonto con roles y permisos
como inertia para la parte frontend del proyecto
## Sección Frontend
Se instalo jetstream `composer require laravel/jetstream` luego se procedio a la instalación
de intertia `php artisan jetstream:install inertia`, luego de instalar inertia se realizo la configuración en
`App\Http\Middleware\HandleInertiaRequests.php` donde se declaran los roles y permisos que tiene el usuario actual,
lo anterior para poner dicha información de manera global y evitar consultarla frecuentemente por aparte para la agregación
de validaciones en las vistas. Finalmente se ejecuto el comando `npm install` para luego poder ejecutar pruebas de desarrollo
con `npm run dev`
## Sección Backend
Se instalo spatie para la gestión de roles y permisos `composer require spatie/laravel-permission`
posteriormente se realizo la publicación de los diferentes elementos que involucran
a spatie `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"` de igual manera en el módelo 
del usuario se agrego `use Spatie\Permission\Traits\HasRoles;` y ya en la clase `use HasRoles;`, todo esto para terminar de 
configurar los roles y permisos con el módelo del usuario
## Seeder
Se realizo la creación de 2 seeders, 1 para crear roles y permisos 
`php artisan make:seeder RoleSeeder` y otro para crear 2 usuarios de prueba `php artisan make:seeder UserSeeder`
en este último seeder se asigno roles a los usuarios creados, finalmente se agregaron dichos seeders en el archivo
principal para luego ser ejecutado `php artisan db:seed`