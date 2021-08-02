<?php

namespace Database\Seeders;

use App\Models\Contrato;
use App\Models\ContratoEstado;
use App\Models\ContratoTipo;
use App\Models\Documento;
use App\Models\Licitacion;
use App\Models\Moneda;
use App\Models\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratosTableSeeder extends Seeder
{

    private $monedas;
    private $proveedores;
    private $licitaciones;
    /**
     * ContratosTableSeeder constructor.
     */
    public function __construct()
    {
        $this->monedas = Moneda::all();
        $this->proveedores = Proveedor::all();
        $this->licitaciones = Licitacion::all();
    }


    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('contratos')->delete();

        $contratos = DB::connection('old')->table('CONTRATOS')->orderBy('ID_CONTRATO')->get();

        foreach ($contratos as $index => $contrato) {
            $data = [
                'id' => $contrato->id_contrato,
                'tipo_id' => $this->getTipo($contrato),
                'moneda_id' => $this->getMoneda($contrato),
                'proveedor_id' => $this->getProveedor($contrato),
                'cargo_id' => $contrato->id_cargo,
                'licitacion_id' => $this->getLicitacion($contrato),
                'monto' => $contrato->monto,
                'estado_alerta' => $contrato->estado_alerta,
                'fecha_inicio' => $contrato->fecha_inicio,
                'fecha_termino' => $contrato->fecha_termino,
                'fecha_aprobacion' => $contrato->fecha_aprobacion,
                'fecha_alerta_vencimiento' => $contrato->fecha_alerta_vencimiento,
                'fecha_vencimiento_boleta' => $contrato->fecha_vencimiento_boleta,
                'alerta_vencimiento_boleta' => $contrato->alerta_vencimiento_boleta,
                'numero_boleta_garantia' => $contrato->nro_boleta_garantia,
                'monto_boleta_garantia' => $contrato->monto_boleta_garantia,
                'id_mercado_publico' => $contrato->id_mercado_publico,
                'objeto' => $contrato->objeto_contrato,
                'estado_id' => ContratoEstado::INGRESADO,
                'user_crea' => $contrato->creado_por,
                'user_actualiza' => $contrato->actualizado_por,
            ];

            Contrato::create($data);
        }

        $maxId = $contratos->max('id_contrato');

        setStartValSequence('CONTRATOS_ID_SEQ',$maxId);


        $this->migrarDocumentos();

        $this->migrarBitacoras();



    }

    function getTipo($contrato){
        switch ($contrato->tipo){
            case "lc":
            case "LC":
                return ContratoTipo::CON_LICITACION;
                break;
            case "td":
                return ContratoTipo::TRATO_DIRECTO;
                break;
        }
    }

    function getMoneda($contrato){
        $moneda = $this->monedas->where('codigo',$contrato->id_moneda)->first();
        return $moneda->id ?? null;
    }

    function getProveedor($contrato){
        return $this->proveedores->where('rut',$contrato->rut_proveedor)->first()->id;
    }

    function getLicitacion($contrato){
//        dd($contrato->nro_licitacion);
        return $this->licitaciones->where('numero',$contrato->nro_licitacion)->first()->id ?? null;
    }

    function migrarDocumentos(){
        /**
         * se iterean la licitaciones del nuevo sistema para cosultar sus documentos en sistema anterior y guardar en nuevo sistema
         * @var Contrato $contrato
         */
        foreach (Contrato::all() as  $contrato) {


//            dd($contrato->id);
            $bitacoras = DB::connection('old')->table('DOCUMENTO_CONTRATOS')
                ->join('DOCUMENTO','DOCUMENTO.NRO_DOCUMENTO','DOCUMENTO_CONTRATOS.NRO_DOCUMENTO')
                ->where('DOCUMENTO_CONTRATOS.NRO_CONTRATO',$contrato->id)
                ->get();


            if ($bitacoras->count()>0){

                //iteracion de los documentos de la licitacion x
                foreach ($bitacoras as  $old) {

                    $newDoc = new Documento([
                        'name' => $old->nombre,
                        'file_name' => $old->nombre,
                        'mime_type' => $old->tipo_archivo,
                        'size' => $old->peso_archivo,
                        'data' => null
                    ]);

                    //se inserta y asocia los datos de documento sin el bianrio o blob
                    $contrato->documentos()->save($newDoc) ;

                    //se obtiene el documento recien asociado
                    $newDocStore = $contrato->documentos()->orderBy('id','desc')->first();

                    //se actualiza el nuevo documento con el binario del documento anterior
                    DB::table('DOCUMENTOS')->whereId($newDocStore->id)->updateLob(
                        [],
                        ['data'=>$old->archivo]
                    );
                }

            }
        }
    }

    function migrarBitacoras(){

        /**
         * se iterean la licitaciones del nuevo sistema para cosultar sus documentos en sistema anterior y guardar en nuevo sistema
         * @var Contrato $contrato
         */
        foreach (Contrato::all() as  $contrato) {


//            dd($contrato->id);
            $bitacoras = DB::connection('old')->table('BITACORA')
                ->join('DOCUMENTO','DOCUMENTO.NRO_DOCUMENTO','BITACORA.NRO_DOCUMENTO')
                ->where('BITACORA.ID_CONTRATO',$contrato->id)
                ->get();


            if ($bitacoras->count()>0){

                //iteracion de los documentos de la licitacion x
                foreach ($bitacoras as  $old) {


                    $contrato->addBitacora(null,$old->glosa,$old->creado_por) ;

                    //se obtiene la bitacora recien asociado
                    $newBitacora = $contrato->bitacoras()->orderBy('id','desc')->first();

                    $newDoc = new Documento([
                        'name' => $old->nombre,
                        'file_name' => $old->nombre,
                        'mime_type' => $old->tipo_archivo,
                        'size' => $old->peso_archivo,
                        'data' => null
                    ]);

                    //se inserta y asocia los datos de documento sin el bianrio o blob
                    $newBitacora->documentos()->save($newDoc) ;

                    //se obtiene el documento recien asociado
                    $newDocStore = $newBitacora->documentos()->orderBy('id','desc')->first();

                    //se actualiza el nuevo documento con el binario del documento anterior
                    DB::table('DOCUMENTOS')->whereId($newDocStore->id)->updateLob(
                        [],
                        ['data'=>$old->archivo]
                    );
                }

            }
        }

    }
}



