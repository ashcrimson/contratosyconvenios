<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContratosEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('contratos_estados')->delete();

        \DB::table('contratos_estados')->insert(array (
            0 =>
            array (
                'id' => '1',
                'nombre' => 'INGRESADO',
                'created_at' => '2021-07-24 14:23:10',
                'updated_at' => '2021-07-24 14:23:10',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => '2',
                'nombre' => 'ASIGNADO',
                'created_at' => '2021-07-24 14:23:19',
                'updated_at' => '2021-07-24 14:23:19',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => '3',
                'nombre' => 'FINALIZADO',
                'created_at' => '2021-07-24 14:23:25',
                'updated_at' => '2021-07-24 14:23:25',
                'deleted_at' => NULL,
            ),
        ));


    }
}
