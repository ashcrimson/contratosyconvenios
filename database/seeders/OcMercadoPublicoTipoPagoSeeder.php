<?php

namespace Database\Seeders;

use App\Models\OcMercadoPublicTipoPago;
use Illuminate\Database\Seeder;

class OcMercadoPublicoTipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OcMercadoPublicTipoPago::firstOrCreate([
            'valor' => 1,
            'descripcion' => '15 días contra la recepción de la factura'
        ]);

        OcMercadoPublicTipoPago::firstOrCreate([
            'valor' => 2,
            'descripcion' => '30 días contra la recepción de la factura'
        ]);

        OcMercadoPublicTipoPago::firstOrCreate([
            'valor' => 39,
            'descripcion' => 'Otra forma de pago'
        ]);

        OcMercadoPublicTipoPago::firstOrCreate([
            'valor' => 46,
            'descripcion' => '50 días contra la recepción de la factura'
        ]);

        OcMercadoPublicTipoPago::firstOrCreate([
            'valor' => 47,
            'descripcion' => '60 días contra la recepción de la factura'
        ]);

        OcMercadoPublicTipoPago::firstOrCreate([
            'valor' => 48,
            'descripcion' => 'A 45 días'
        ]);

        OcMercadoPublicTipoPago::firstOrCreate([
            'valor' => 49,
            'descripcion' => 'A más de 30 días'
        ]);
    }
}
