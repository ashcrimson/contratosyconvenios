<?php

namespace Database\Seeders;

use App\Models\OcMercadoPublicoTipoDespacho;
use Illuminate\Database\Seeder;

class OcMercadoPublicoTipoDespachoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OcMercadoPublicoTipoDespacho::firstOrCreate([
            'valor' => 7,
            'descripcion' => 'Despachar a Dirección de envío'
        ]);

        OcMercadoPublicoTipoDespacho::firstOrCreate([
            'valor' => 9,
            'descripcion' => 'Despachar según programa adjuntado'
        ]);

        OcMercadoPublicoTipoDespacho::firstOrCreate([
            'valor' => 12,
            'descripcion' => 'Otra Forma de Despacho, Ver Instruc'
        ]);

        OcMercadoPublicoTipoDespacho::firstOrCreate([
            'valor' => 14,
            'descripcion' => 'Retiramos de su bodega'
        ]);

        OcMercadoPublicoTipoDespacho::firstOrCreate([
            'valor' => 20,
            'descripcion' => 'Despacho por courier o encomienda aérea'
        ]);

        OcMercadoPublicoTipoDespacho::firstOrCreate([
            'valor' => 21,
            'descripcion' => 'Despacho por courier o encomienda terrestre'
        ]);

        OcMercadoPublicoTipoDespacho::firstOrCreate([
            'valor' => 22,
            'descripcion' => 'A convenir'
        ]);
    }
}
