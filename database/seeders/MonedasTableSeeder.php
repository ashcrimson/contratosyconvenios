<?php

namespace Database\Seeders;

use App\Models\Moneda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonedasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('monedas')->delete();

        $monedas = DB::connection('old')->table('MONEDA')->orderBy('CODIGO')->get();

        foreach ($monedas as $index => $moneda) {
            dump($moneda);
            Moneda::create([
                'nombre' => $moneda->nombre,
                'codigo' => $moneda->codigo,
                'equivalencia' => $moneda->equivalencia
            ]);
        }



    }
}
