<?php

namespace Database\Seeders;

use App\Models\OrdenCompraEstado;
use Illuminate\Database\Seeder;

class OrdenesComprasEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('ordenes_compras_estados')->delete();


        factory(OrdenCompraEstado::class,1)->create(['nombre' => 'TEMPORAL']);
        factory(OrdenCompraEstado::class,1)->create(['nombre' => 'INGRESADA']);
        factory(OrdenCompraEstado::class,1)->create(['nombre' => 'EN PROCESO']);
        factory(OrdenCompraEstado::class,1)->create(['nombre' => 'ACEPTADA']);
        factory(OrdenCompraEstado::class,1)->create(['nombre' => 'RECEPCIÓN CONFORME']);
        factory(OrdenCompraEstado::class,1)->create(['nombre' => 'ENVIADA A PROVEEDOR']);
        factory(OrdenCompraEstado::class,1)->create(['nombre' => 'ANULACIÓN REQUERIDA']);
        factory(OrdenCompraEstado::class,1)->create(['nombre' => 'ANULADA']);


    }
}
