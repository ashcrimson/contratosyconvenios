<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContratosTiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('contratos_tipos')->delete();

        \DB::table('contratos_tipos')->insert(array (
            0 =>
            array (
                'id' => '1',
                'nombre' => 'CON LICITACIÓN',
                'created_at' => '2021-07-24 14:28:30',
                'updated_at' => '2021-07-24 14:28:30',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => '2',
                'nombre' => 'TRATO DIRECTO',
                'created_at' => '2021-07-24 14:28:39',
                'updated_at' => '2021-07-24 14:28:39',
                'deleted_at' => NULL,
            ),
        ));


    }
}
