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
        Option::firstOrCreate([
            'id' => '23',
            'option_id' => '12',
            'nombre' => 'Unidad Monetaria',
            'ruta' => 'unidadMonetarias.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '12',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-05-05 10:57:00',
            'updated_at' => '2020-05-05 10:57:00',
            'deleted_at' => NULL,
        ]);
        Option::firstOrCreate([
            'id' => '24',
            'option_id' => '12',
            'nombre' => 'Despacho TIpos',
            'ruta' => 'despachoTipos.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '13',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-05-05 10:57:00',
            'updated_at' => '2020-05-05 10:57:00',
            'deleted_at' => NULL,
        ]);
        Option::firstOrCreate([
            'id' => '25',
            'option_id' => '12',
            'nombre' => 'Forma Pagos',
            'ruta' => 'formaPagos.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '14',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-05-05 10:57:00',
            'updated_at' => '2020-05-05 10:57:00',
            'deleted_at' => NULL,
        ]);
        Option::firstOrCreate([
            'id' => '26',
            'option_id' => '12',
            'nombre' => 'Orden Compra Estados',
            'ruta' => 'ordenCompraEstados.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '6',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-05-05 10:57:00',
            'updated_at' => '2020-05-05 10:57:00',
            'deleted_at' => NULL,
        ]);
 //       Option::firstOrCreate([
 //           'id' => '27',
 //           'option_id' => NULL,
//            'nombre' => 'OC MERCADO PUBLICO',
//            'ruta' => 'ocMercadoPublicos.index',
//            'descripcion' => NULL,
//            'icono_l' => 'fa-file',
//            'icono_r' => NULL,
//            'orden' => '4',
//            'color' => 'bg-teal',
 //           'dev' => '0',
//            'created_at' => '2020-05-05 10:57:00',
 //           'updated_at' => '2020-05-05 10:57:00',
//            'deleted_at' => NULL,
//        ]);

        Option::firstOrCreate([
            'id' => '54',
            'option_id' => 12,
            'nombre' => 'OC MP TIPO ORDEN COMPRA',
            'ruta' => 'ocMpTipoOrdenCompras.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '4',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-06-18 09:29:00',
            'updated_at' => '2020-06-18 09:29:00',
            'deleted_at' => NULL,
        ]);

        Option::firstOrCreate([
            'id' => '55',
            'option_id' => 12,
            'nombre' => 'OC MP TIPO MONEDA',
            'ruta' => 'ocMercadoPublicoTipoMonedas.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '4',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-06-18 09:58:00',
            'updated_at' => '2020-06-18 09:58:00',
            'deleted_at' => NULL,
        ]);

        Option::firstOrCreate([
            'id' => '56',
            'option_id' => 12,
            'nombre' => 'OC MP TIPO DESPACHO',
            'ruta' => 'ocMercadoPublicoTipoDespachos.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '4',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-06-19 23:14:00',
            'updated_at' => '2020-06-19 23:14:00',
            'deleted_at' => NULL,
        ]);

        Option::firstOrCreate([
            'id' => '57',
            'option_id' => 12,
            'nombre' => 'OC MP TIPO PAGO',
            'ruta' => 'ocMercadoPublicTipoPagos.index',
            'descripcion' => NULL,
            'icono_l' => 'fa-circle-notch',
            'icono_r' => NULL,
            'orden' => '4',
            'color' => 'bg-teal',
            'dev' => '0',
            'created_at' => '2020-06-19 23:31:00',
            'updated_at' => '2020-06-19 23:31:00',
            'deleted_at' => NULL,
        ]);
    }
}
