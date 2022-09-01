<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cargo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        // DB::table('cargos')->delete();

        // $cargos = DB::connection('old')->table('CARGOS')->orderBy('ID_CARGO')->get();

        // foreach ($cargos as $index => $cargo) {
        //     Cargo::create([
        //         'id' => $cargo->id_cargo,
        //         'nombre' => $cargo->nombre
        //     ]);
        // }

        // $maxId = $cargos->max('id_cargo');

//        DB::statement("ALTER SEQUENCE CARGOS_ID_SEQ RESTART WITH ".$cargos->count().";");

        // setStartValSequence('CARGOS_ID_SEQ',$maxId);

    // }
}
