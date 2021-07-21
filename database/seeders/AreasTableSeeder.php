<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('areas')->delete();

        $areas = DB::connection('old')->table('AREAS')->orderBy('ID_AREA')->get();

        foreach ($areas as $index => $area) {
            Area::create([
                'id' => $area->id_area,
                'cargo_id' => $area->id_cargo,
                'nombre' => $area->area
            ]);
        }

        $maxId = $areas->max('id_area');

        setStartValSequence('AREAS_ID_SEQ',$maxId);




    }
}
