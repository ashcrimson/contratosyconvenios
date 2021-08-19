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

        $role= Role::create(["name" => "ADMINISTRADOR SISTEMA"]);
        $role->syncPermissions(Permission::pluck('name')->toArray());

        $role = Role::create(["name" => "ADMINISTRADOR CONTRATO"]);

        $role = Role::create(["name" => "COMPRADOR"]);

        $role = Role::create(["name" => "ADMINISTRADOR TÉCNICO"]);


    }
}
