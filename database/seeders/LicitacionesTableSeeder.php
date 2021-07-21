<?php

namespace Database\Seeders;


use App\Models\Licitacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicitacionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('licitaciones')->delete();

        $licitaciones = DB::connection('old')->table('LICITACIONES')
            ->orderBy('FECHA_CREACION')
            ->get();


        foreach ($licitaciones as $index => $licitacion) {
            Licitacion::create([
                'numero' => $licitacion->nro_licitacion,
                'descripcion' => $licitacion->detalle,
                'presupuesto' => $licitacion->presupuesto
            ]);
        }


    }
}
