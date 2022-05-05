<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnidadesMonetariasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('unidades_monetarias')->delete();

        \DB::table('unidades_monetarias')->insert(array (
            0 =>
            array (
                'deleted_at' => NULL,
                'updated_at' => '2022-05-05 10:58:58',
                'valor' => 'CLP',
                'id' => '1',
                'created_at' => '2022-05-05 10:58:58',
                'descripcion' => 'Peso Chileno',
            ),
            1 =>
            array (
                'deleted_at' => NULL,
                'updated_at' => '2022-05-05 10:58:58',
                'valor' => 'CLF',
                'id' => '2',
                'created_at' => '2022-05-05 10:58:58',
                'descripcion' => 'Unidad de Fomento',
            ),
            2 =>
            array (
                'deleted_at' => NULL,
                'updated_at' => '2022-05-05 10:58:58',
                'valor' => 'USD',
                'id' => '3',
                'created_at' => '2022-05-05 10:58:58',
                'descripcion' => 'Dólar Americano',
            ),
            3 =>
            array (
                'deleted_at' => NULL,
                'updated_at' => '2022-05-05 10:58:58',
                'valor' => 'UTM',
                'id' => '4',
                'created_at' => '2022-05-05 10:58:58',
                'descripcion' => 'Unidad Tributaria Mensual',
            ),
            4 =>
            array (
                'deleted_at' => NULL,
                'updated_at' => '2022-05-05 10:58:58',
                'valor' => 'EUR',
                'id' => '5',
                'created_at' => '2022-05-05 10:58:58',
                'descripcion' => 'Euro',
            ),
        ));


    }
}
