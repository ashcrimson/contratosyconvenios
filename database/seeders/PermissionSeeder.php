<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (Route::getRoutes() as $route){

            Permission::firstOrCreate(['name' => 'Ver configuración']);
            Permission::firstOrCreate(['name' => 'Crear configuración']);
            Permission::firstOrCreate(['name' => 'Editar configuración']);
            Permission::firstOrCreate(['name' => 'Eliminar configuración']);

            Permission::firstOrCreate(['name' => 'Ver opcion menu']);
            Permission::firstOrCreate(['name' => 'Crear opcion menu']);
            Permission::firstOrCreate(['name' => 'Editar opcion menu']);
            Permission::firstOrCreate(['name' => 'Eliminar opcion menu']);

            Permission::firstOrCreate(['name' => 'Ver permisos']);
            Permission::firstOrCreate(['name' => 'Crear permisos']);
            Permission::firstOrCreate(['name' => 'Editar permisos']);
            Permission::firstOrCreate(['name' => 'Eliminar permisos']);

            Permission::firstOrCreate(['name' => 'Ver roles']);
            Permission::firstOrCreate(['name' => 'Crear roles']);
            Permission::firstOrCreate(['name' => 'Editar roles']);
            Permission::firstOrCreate(['name' => 'Eliminar roles']);

            Permission::firstOrCreate(['name' => 'Ver usuarios']);
            Permission::firstOrCreate(['name' => 'Crear usuarios']);
            Permission::firstOrCreate(['name' => 'Editar usuarios']);
            Permission::firstOrCreate(['name' => 'Eliminar usuarios']);


            Permission::firstOrCreate(['name' => 'Ver Areas']);
            Permission::firstOrCreate(['name' => 'Crear Areas']);
            Permission::firstOrCreate(['name' => 'Editar Areas']);
            Permission::firstOrCreate(['name' => 'Eliminar Areas']);


            Permission::firstOrCreate(['name' => 'Ver Cargos']);
            Permission::firstOrCreate(['name' => 'Crear Cargos']);
            Permission::firstOrCreate(['name' => 'Editar Cargos']);
            Permission::firstOrCreate(['name' => 'Eliminar Cargos']);


            Permission::firstOrCreate(['name' => 'Ver Contratos']);
            Permission::firstOrCreate(['name' => 'Crear Contratos']);
            Permission::firstOrCreate(['name' => 'Editar Contratos']);
            Permission::firstOrCreate(['name' => 'Eliminar Contratos']);


            Permission::firstOrCreate(['name' => 'Ver Licitaciones']);
            Permission::firstOrCreate(['name' => 'Crear Licitaciones']);
            Permission::firstOrCreate(['name' => 'Editar Licitaciones']);
            Permission::firstOrCreate(['name' => 'Eliminar Licitaciones']);


            Permission::firstOrCreate(['name' => 'Ver Monedas']);
            Permission::firstOrCreate(['name' => 'Crear Monedas']);
            Permission::firstOrCreate(['name' => 'Editar Monedas']);
            Permission::firstOrCreate(['name' => 'Eliminar Monedas']);

            Permission::firstOrCreate(['name' => 'Ver Orden Compras']);
            Permission::firstOrCreate(['name' => 'Crear Orden Compras']);
            Permission::firstOrCreate(['name' => 'Editar Orden Compras']);
            Permission::firstOrCreate(['name' => 'Eliminar Orden Compras']);
            Permission::firstOrCreate(['name' => 'Anular Orden Compras']);


            Permission::firstOrCreate(['name' => 'Ver Bitacoras']);
            Permission::firstOrCreate(['name' => 'Crear Bitacoras']);
            Permission::firstOrCreate(['name' => 'Editar Bitacoras']);
            Permission::firstOrCreate(['name' => 'Eliminar Bitacoras']);


            Permission::firstOrCreate(['name' => 'Ver todos los contratos']);
            Permission::firstOrCreate(['name' => 'Asignar Contratos']);


        }

    }
}
