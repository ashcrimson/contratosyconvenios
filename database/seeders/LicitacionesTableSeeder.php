<?php

namespace Database\Seeders;


use App\Models\Documento;
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

        //totas las licitaciones del sistema aterior
        // $licitaciones = DB::connection('old')->table('LICITACIONES')
        //     ->orderBy('FECHA_CREACION')
        //     ->get();


        //se iteran las licitaciones del sistema anterior para insertar en nueva tabla
        // foreach ($licitaciones as $index => $licitacion) {
        //     Licitacion::create([
        //         'numero' => $licitacion->nro_licitacion,
        //         'descripcion' => $licitacion->detalle,
        //         'presupuesto' => $licitacion->presupuesto,
        //         'user_crea' => $licitacion->creado_por,
        //         'user_actualiza' => $licitacion->actualizado_por
        //     ]);
        // }

        // $licitaciones = Licitacion::all();

        /**
         * se iterean la licitaciones del nuevo sistema para cosultar sus documentos en sistema anterior y guardar en nuevo sistema
         * @var Licitacion $licitacion
         */
        // foreach ($licitaciones as $index => $licitacion) {


        //     $documentos = DB::connection('old')->table('DOCUMENTO_LICITACIONES')
        //         ->join('DOCUMENTO','DOCUMENTO.NRO_DOCUMENTO','DOCUMENTO_LICITACIONES.NRO_DOCUMENTO')
        //         ->where('DOCUMENTO_LICITACIONES.NRO_LICITACION',$licitacion->numero)
        //         ->get();


        //     if ($documentos->count()>0){

        //         //iteracion de los documentos de la licitacion x
        //         foreach ($documentos as $index => $old) {

        //             $newDoc = new Documento([
        //                 'name' => $old->nombre,
        //                 'file_name' => $old->nombre,
        //                 'mime_type' => $old->tipo_archivo,
        //                 'size' => $old->peso_archivo,
        //                 'data' => null
        //             ]);

        //             //se inserta y asocia los datos de documento sin el bianrio o blob
        //             $licitacion->documentos()->save($newDoc) ;

        //             //se obtiene el documento recien asociado
        //             $newDocStore = $licitacion->documentos()->orderBy('id','desc')->first();

        //             //se actualiza el nuevo documento con el binario del documento anterior
        //             DB::table('DOCUMENTOS')->whereId($newDocStore->id)->updateLob(
        //                 [],
        //                 ['data'=>$old->archivo]
        //             );
                }

            }
        }



    }
}
