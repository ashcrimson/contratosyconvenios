<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('areas')->delete();
        
        \DB::table('areas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cargo_id' => 20,
                'nombre' => 'Infraestructura',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'cargo_id' => 20,
                'nombre' => 'Sistemas',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'cargo_id' => 20,
                'nombre' => 'Mesa de Ayuda',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 8,
                'cargo_id' => 18,
                'nombre' => 'Mantenimiento',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 9,
                'cargo_id' => 18,
                'nombre' => 'Logistica',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 10,
                'cargo_id' => 18,
                'nombre' => 'Mejoramiento Continuo',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}