<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionTable2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::firstOrCreate([
            'id' => '22',
            'option_id' => '12',
            'nombre' => 'Orden Compra Tipos',
            'ruta' => 'ordenCompraTipos.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '11',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-05-05 10:40:00',
            'updated_at' => '2020-05-05 10:40:00',
            'deleted_at' => NULL,
        ]);
    }
}
