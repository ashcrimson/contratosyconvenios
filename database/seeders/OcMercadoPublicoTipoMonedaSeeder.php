<?php

namespace Database\Seeders;

use App\Models\OcMercadoPublicoTipoMoneda;
use Illuminate\Database\Seeder;

class OcMercadoPublicoTipoMonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OcMercadoPublicoTipoMoneda::firstOrCreate([
            'valor' => 'CLP',
            'descripcion' => 'Peso Chileno'
        ]);

        OcMercadoPublicoTipoMoneda::firstOrCreate([
            'valor' => 'CLF',
            'descripcion' => 'Unidad de Fomento'
        ]);

        OcMercadoPublicoTipoMoneda::firstOrCreate([
            'valor' => 'USD',
            'descripcion' => 'Dólar Americano'
        ]);

        OcMercadoPublicoTipoMoneda::firstOrCreate([
            'valor' => 'UTM',
            'descripcion' => 'Unidad Tributaria Mensual'
        ]);

        OcMercadoPublicoTipoMoneda::firstOrCreate([
            'valor' => 'EUR',
            'descripcion' => 'Euro'
        ]);
    }
}
