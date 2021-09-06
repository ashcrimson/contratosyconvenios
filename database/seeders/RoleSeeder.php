<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "Developer"]);
        Role::create(["name" => "Superadmin"]);

        /**
         * @var Role $role
         */
        $role= Role::create(["name" => "ADMINISTRADOR SISTEMA"]);

        //se le asignan todos los permisos al rol ADMINISTRADOR SISTEMA
        $role->syncPermissions(Permission::pluck('name')->toArray());
        //se quita el permiso  al rol ADMINISTRADOR SISTEMA
        $role->revokePermissionTo(['Asignar Contratos a area']);

        $role = Role::create(["name" => "ADMINISTRADOR CONTRATO"]);

        //permisos asigandos al rol ADMINISTRADOR CONTRATO (PermissionSeeder)
        $role->syncPermissions([
            'Asignar Contratos a cargo',
            'Asignar Contratos a area',
            'Agregar Bitacora Contratos',
            'Eliminar Bitacora Contratos',
            'Admin detalles contrato',
            'Editar detalle contrato',
            'Eliminar detalle contrato',

            'Ver opcion menu',
            'Ver Contratos',
            'Ver Licitaciones',
            'Ver Monedas',
            'Ver Orden Compras',
            'Ver Bitacoras',
        ]);


        $role = Role::create(["name" => "COMPRADOR"]);

        //permisos asigandos al rol COMPRADOR (PermissionSeeder)
        $role->syncPermissions([
            'Ver opcion menu',
            'Ver Contratos',
            'Ver Licitaciones',
            'Ver Monedas',
            'Ver Orden Compras',
            'Ver Bitacoras',
            'Agregar Bitacora Contratos',
            'Eliminar Bitacora Contratos',
        ]);

        $role = Role::create(["name" => "ADMINISTRADOR TÉCNICO"]);

        //permisos asigandos al rol ADMINISTRADOR TÉCNICO (PermissionSeeder)
        $role->syncPermissions([
            'Agregar Bitacora Contratos',
            'Eliminar Bitacora Contratos',
            'Admin detalles contrato',
            'Editar detalle contrato',
            'Eliminar detalle contrato',

            'Ver opcion menu',
            'Ver Contratos',
            'Ver Licitaciones',
            'Ver Monedas',
            'Ver Orden Compras',
            'Ver Bitacoras',
        ]);

        $role = Role::create(["name" => "SUB DIRECTOR"]);

        $role->syncPermissions([
            'Asignar Contratos a cargo',
            'Asignar Contratos a area',
            'Agregar Bitacora Contratos',
            'Eliminar Bitacora Contratos',
            'Admin detalles contrato',
            'Editar detalle contrato',
            'Eliminar detalle contrato',

            'Ver opcion menu',
            'Ver Contratos',
            'Ver Licitaciones',
            'Ver Monedas',
            'Ver Orden Compras',
            'Ver Bitacoras',
        ]);

    }
}
