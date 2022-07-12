<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleAdmTecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * @var Role $roleAdmTecnico
         */
        $roleAdmTecnico= Role::find(Role::ADMIN_TÉCNICO);

        $roleAdmTecnico->options()->syncWithoutDetaching([27]);

        $roleAdmTecnico->syncPermissions([
            'Ver Contratos',
            'Ver Licitaciones',
            'Ver Bitacoras',
            'Crear Bitacoras',
            'Agregar Bitacora Contratos',
            'Ver Oc Mercado Publicos',
            'Crear Oc Mercado Publicos',
            'Editar Oc Mercado Publicos',
            'Agregar Bitacora Oc Mercado Publicos',
        ]);

    }
}
