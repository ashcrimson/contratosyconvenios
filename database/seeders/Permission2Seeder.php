<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class Permission2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::firstOrCreate(['name' => 'Ver Oc Mercado Publicos']);
        Permission::firstOrCreate(['name' => 'Crear Oc Mercado Publicos']);
        Permission::firstOrCreate(['name' => 'Editar Oc Mercado Publicos']);
        Permission::firstOrCreate(['name' => 'Eliminar Oc Mercado Publicos']);

        Permission::firstOrCreate(['name' => 'Agregar Bitacora Oc Mercado Publicos']);
        Permission::firstOrCreate(['name' => 'Eliminar Bitacora Oc Mercado Publicos']);

    }
}
