<?php

namespace Database\Seeders;

use App\Models\Contrato;
use App\Models\ContratoEstado;
use App\Models\Documento;
use App\Models\OrdenCompra;
use App\Models\OrdenCompraEstado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenesComprasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('ordenes_compras')->delete();

        $compras = DB::connection('old')->table('orden_compra')->get();


        foreach ($compras as $index => $compra) {
            $data = [
                'contrato_id' => $compra->id_contrato==13 ? null : $compra->id_contrato,
                'numero' => $compra->nro_orden_compra,
                'fecha_envio' => $compra->fecha_envio,
                'total' => $compra->total,
                'codigo' => $compra->codigo,
                'cantidad' => $compra->cantidad,
                'descripcion' => $compra->descripcion,
                'tiene_detalles' => $compra->tiene_detalles,
                'estado_id' => $this->getEstado($compra),
                'user_crea' => $compra->creado_por==15 ? null : $compra->creado_por,
                'user_actualiza' => $compra->actualizado_por
            ];

            OrdenCompra::create($data);
        }

        $maxId = $compras->max('id_compra');

        setStartValSequence('ORDENES_COMPRAS_ID_SEQ',$maxId);


        /**
         * se iterean la licitaciones del nuevo sistema para cosultar sus documentos en sistema anterior y guardar en nuevo sistema
         * @var OrdenCompra $compra
         */
        foreach (OrdenCompra::all() as $index => $compra) {


//            dd($compra->id);
            $documentos = DB::connection('old')->table('DOCUMENTO_ORDEN_COMPRA')
                ->join('DOCUMENTO','DOCUMENTO.NRO_DOCUMENTO','DOCUMENTO_ORDEN_COMPRA.NRO_DOCUMENTO')
                ->where('DOCUMENTO_ORDEN_COMPRA.NRO_ORDEN_COMPRA',$compra->numero)
                ->get();


            if ($documentos->count()>0){

                //iteracion de los documentos de la licitacion x
                foreach ($documentos as $index => $old) {

                    $newDoc = new Documento([
                        'name' => $old->nombre,
                        'file_name' => $old->nombre,
                        'mime_type' => $old->tipo_archivo,
                        'size' => $old->peso_archivo,
                        'data' => null
                    ]);

                    //se inserta y asocia los datos de documento sin el bianrio o blob
                    $compra->documentos()->save($newDoc) ;

                    //se obtiene el documento recien asociado
                    $newDocStore = $compra->documentos()->orderBy('id','desc')->first();

                    //se actualiza el nuevo documento con el binario del documento anterior
                    DB::table('DOCUMENTOS')->whereId($newDocStore->id)->updateLob(
                        [],
                        ['data'=>$old->archivo]
                    );
                }

            }
        }


    }

    function getEstado($comras){
        switch ($comras->estado){
            case "Aceptada":
                return OrdenCompraEstado::ACEPTADA;
                break;
            case "Enviada a Proveedor":
                return OrdenCompraEstado::ENVIADA_PROVEEDOR;
                break;
            case "Recepcion Conforme":
            case "Recepci—n Conforme":
            case "Recepci?n Conforme":
            case "Recepción Conforme":
                return OrdenCompraEstado::RECEPCION_CONFORME;
                break;
            case "En Proceso":
                return OrdenCompraEstado::EN_PROCESO;
                break;
            case "Anulada":
                return OrdenCompraEstado::ANULADA;
                break;
            case "Cancelacion Requerida":
                return OrdenCompraEstado::ANULACIÓN_REQUERIDA;
                break;
            default:
                return OrdenCompraEstado::INGRESADA;
        }
    }
}
