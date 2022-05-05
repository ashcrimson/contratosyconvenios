<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdenCompraTiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orden_compra_tipos')->delete();
        
        \DB::table('orden_compra_tipos')->insert(array (
            0 => 
            array (
                'abreviacion' => 'SE',
                'updated_at' => '2022-05-05 10:45:02',
                'codigo' => '8',
                'id' => '1',
                'deleted_at' => NULL,
                'descripcion' => 'Sin emisión automática',
                'created_at' => '2022-05-05 10:45:02',
            ),
            1 => 
            array (
                'abreviacion' => 'CM',
                'updated_at' => '2022-05-05 10:45:41',
                'codigo' => '9',
                'id' => '2',
                'deleted_at' => NULL,
                'descripcion' => 'Convenio Marco',
                'created_at' => '2022-05-05 10:45:31',
            ),
        ));
        
        
    }
}