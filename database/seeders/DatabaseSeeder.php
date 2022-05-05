<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);

        $this->call(CargosTableSeeder::class);
        $this->call(AreasTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(MonedasTableSeeder::class);
        $this->call(ProveedoresTableSeeder::class);
        $this->call(LicitacionesTableSeeder::class);
        $this->call(ContratosEstadosTableSeeder::class);
        $this->call(ContratosTiposTableSeeder::class);
        $this->call(ContratosTableSeeder::class);
        $this->call(OrdenesComprasEstadosTableSeeder::class);
        $this->call(OrdenesComprasTableSeeder::class);
        $this->call(OrdenCompraTiposTableSeeder::class);
        $this->call(UnidadesMonetariasTableSeeder::class);
        $this->call(DespachosTiposTableSeeder::class);
    }
}
