<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DespachosTiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('despachos_tipos')->delete();

        \DB::table('despachos_tipos')->insert(array (
            0 =>
            array (
                'valor' => '7',
                'id' => '1',
                'updated_at' => '2022-05-05 11:14:50',
                'created_at' => '2022-05-05 11:14:50',
                'deleted_at' => NULL,
                'descripcion' => 'Despachar a Dirección de envío',
            ),
            1 =>
            array (
                'valor' => '9',
                'id' => '2',
                'updated_at' => '2022-05-05 11:14:50',
                'created_at' => '2022-05-05 11:14:50',
                'deleted_at' => NULL,
                'descripcion' => 'Despachar según programa adjuntado',
            ),
            2 =>
            array (
                'valor' => '12',
                'id' => '3',
                'updated_at' => '2022-05-05 11:14:50',
                'created_at' => '2022-05-05 11:14:50',
                'deleted_at' => NULL,
                'descripcion' => 'Otra Forma de Despacho, Ver Instruc',
            ),
            3 =>
            array (
                'valor' => '14',
                'id' => '4',
                'updated_at' => '2022-05-05 11:14:50',
                'created_at' => '2022-05-05 11:14:50',
                'deleted_at' => NULL,
                'descripcion' => 'Retiramos de su bodega',
            ),
            4 =>
            array (
                'valor' => '20',
                'id' => '5',
                'updated_at' => '2022-05-05 11:14:50',
                'created_at' => '2022-05-05 11:14:50',
                'deleted_at' => NULL,
                'descripcion' => 'Despacho por courier o encomienda aérea',
            ),
            5 =>
            array (
                'valor' => '21',
                'id' => '6',
                'updated_at' => '2022-05-05 11:14:50',
                'created_at' => '2022-05-05 11:14:50',
                'deleted_at' => NULL,
                'descripcion' => 'Despacho por courier o encomienda terrestre',
            ),
            6 =>
            array (
                'valor' => '22',
                'id' => '7',
                'updated_at' => '2022-05-05 11:14:50',
                'created_at' => '2022-05-05 11:14:50',
                'deleted_at' => NULL,
                'descripcion' => 'A convenir',
            ),
        ));


    }
}
