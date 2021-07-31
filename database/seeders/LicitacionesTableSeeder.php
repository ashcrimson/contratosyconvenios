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
                'presupuesto' => $licitacion->presupuesto,
                'user_crea' => $licitacion->creado_por,
                'user_actualiza' => $licitacion->actualizado_por
            ]);
        }

//        $licitaciones = Licitacion::whereNumero('1060323-1-LR20')->get();
//
//        /**
//         * @var Licitacion $licitacion
//         */
//        foreach ($licitaciones as $index => $licitacion) {
//
//
//
//            $oldDoc = DB::connection('old')->table('DOCUMENTO_LICITACIONES')
//                ->join('DOCUMENTO','DOCUMENTO.NRO_DOCUMENTO','DOCUMENTO_LICITACIONES.NRO_DOCUMENTO')
//                ->where('DOCUMENTO_LICITACIONES.NRO_LICITACION',$licitacion->numero)
//                ->first();
//
////            $archivo = $oldDoc['DOCUMENTO.ARCHIVO'];
//
//
//            $documento = new Documento([
//                'name' => $oldDoc->nombre,
//                'file_name' => $oldDoc->nombre,
//                'mime_type' => $oldDoc->tipo_archivo,
//                'size' => $oldDoc->peso_archivo,
//                'data' => null
//            ]);
//
//            $licitacion->documentos()->save($documento);
//
//            $new = $licitacion->documentos->first();
//
//            $new->data = $oldDoc->archivo;
//            $new->save();
//
//            dd($new->toArray());
//
//        }



    }
}
