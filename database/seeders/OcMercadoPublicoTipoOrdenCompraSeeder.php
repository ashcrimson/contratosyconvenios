<?php

namespace Database\Seeders;

use App\Models\OcMercadoPublicoTipoOrdenCompra;
use Illuminate\Database\Seeder;

class OcMercadoPublicoTipoOrdenCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 1,
            'abreviacion' => 'OC',
            'descripcion' => 'Automatica'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 2,
            'abreviacion' => 'D1',
            'descripcion' => 'Trato directo que genera Orden de Compra por proveedor único'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 3,
            'abreviacion' => 'C1',
            'descripcion' => 'Trato directo que genera Orden de Compra por emergencia, urgencia e imprevisto'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 4,
            'abreviacion' => 'F3',
            'descripcion' => 'Trato directo que genera Orden de Compra por confidencialidad'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 5,
            'abreviacion' => 'G1',
            'descripcion' => 'Trato directo que genera Orden de Compra por naturaleza de negociación'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 6,
            'abreviacion' => 'R1',
            'descripcion' => 'Orden de compra menor a 3UTM'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 7,
            'abreviacion' => 'CA',
            'descripcion' => 'Orden de compra sin resolución'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 8,
            'abreviacion' => 'SE',
            'descripcion' => 'Sin emisión automática'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 9,
            'abreviacion' => 'CM',
            'descripcion' => 'Convenio Marco'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 10,
            'abreviacion' => 'FG',
            'descripcion' => 'Trato Directo (Art. 8 letras f y g - Ley 19.886)'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 11,
            'abreviacion' => 'TL',
            'descripcion' => 'Convenio Marco – Tienda de Libros (Obsoleto)'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 12,
            'abreviacion' => 'MC',
            'descripcion' => 'Microcompra (Obsoleto)'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 13,
            'abreviacion' => 'AG',
            'descripcion' => 'Compra Ágil'
        ]);

        OcMercadoPublicoTipoOrdenCompra::firstOrCreate([
            'codigo' => 14,
            'abreviacion' => 'CC',
            'descripcion' => 'Compra Coordinada'
        ]);
    }
}
