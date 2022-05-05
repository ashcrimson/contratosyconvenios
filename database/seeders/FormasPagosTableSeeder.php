<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FormasPagosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('formas_pagos')->delete();

        \DB::table('formas_pagos')->insert(array (
            0 =>
            array (
                'deleted_at' => NULL,
                'valor' => '1',
                'updated_at' => '2022-05-05 11:40:13',
                'id' => '1',
                'created_at' => '2022-05-05 11:39:54',
                'descripcion' => '15 días contra la recepción de la factura',
            ),
            1 =>
            array (
                'deleted_at' => NULL,
                'valor' => '2',
                'updated_at' => '2022-05-05 11:40:13',
                'id' => '2',
                'created_at' => '2022-05-05 11:39:54',
                'descripcion' => '30 días contra la recepción de la factura',
            ),
            2 =>
            array (
                'deleted_at' => NULL,
                'valor' => '39',
                'updated_at' => '2022-05-05 11:40:13',
                'id' => '3',
                'created_at' => '2022-05-05 11:39:54',
                'descripcion' => 'Otra forma de pago',
            ),
            3 =>
            array (
                'deleted_at' => NULL,
                'valor' => '46',
                'updated_at' => '2022-05-05 11:40:13',
                'id' => '4',
                'created_at' => '2022-05-05 11:39:54',
                'descripcion' => '50 días contra la recepción de la factura',
            ),
            4 =>
            array (
                'deleted_at' => NULL,
                'valor' => '47',
                'updated_at' => '2022-05-05 11:40:13',
                'id' => '5',
                'created_at' => '2022-05-05 11:39:54',
                'descripcion' => '60 días contra la recepción de la factura',
            ),
        ));


    }
}
