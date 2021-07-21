<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MonedasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('monedas')->delete();
        
        \DB::table('monedas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'PESO',
                'codigo' => 'CLP',
                'equivalencia' => 1.0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Euro',
                'codigo' => 'EURO',
                'equivalencia' => 759.91,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'UF',
                'codigo' => 'UF',
                'equivalencia' => 27551.56,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Dolar',
                'codigo' => 'USD',
                'equivalencia' => 672.14,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'UTM',
                'codigo' => 'UTM',
                'equivalencia' => 4853.0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}