<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        /*
            - la función share -> se utiliza para compartir datos globalmente con todas las vistas de Inertia
            
            - array_merge(parent::share($request), [...]): -> Combina el array devuelto por la función share del middleware padre con el 
                nuevo array que se define dentro del método. Esto asegura que los datos compartidos por el middleware padre también se 
                incluyan, además de los nuevos datos que estamos añadiendo.

            PROPOSITO
            El propósito de este código es asegurar que cada vez que se renderiza una vista con Inertia, la información sobre los roles y 
            permisos del usuario autenticado esté disponible globalmente en el frontend. Esto es útil para, por ejemplo, mostrar u ocultar
            elementos de la interfaz de usuario basados en los roles o permisos del usuario, sin necesidad de hacer múltiples solicitudes al
            servidor para obtener estos datos.

            CONCLUSIÓN
            Este middleware personaliza los datos compartidos con las vistas de Inertia para incluir los roles y permisos del usuario 
            autenticado, facilitando la gestión de permisos y roles directamente en el frontend de tu aplicación Laravel con Inertia.js.
        */

        return array_merge(parent::share($request), [
            'user.roles' => $request->user() ? $request->user()->roles->pluck('name') : [],
            'user.permissions' => $request->user() ? $request->user()->getPermissionsViaRoles()->pluck('name') : [],
        ]);
    }
}
