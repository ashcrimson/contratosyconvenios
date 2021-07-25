<?php

namespace Database\Seeders;

use App\Models\Contrato;
use App\Models\ContratoEstado;
use App\Models\ContratoTipo;
use App\Models\Moneda;
use App\Models\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratosTableSeeder extends Seeder
{

    private $monedas;
    private $proveedores;
    /**
     * ContratosTableSeeder constructor.
     */
    public function __construct()
    {
        $this->monedas = Moneda::all();
        $this->proveedores = Proveedor::all();
    }


    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('contratos')->delete();

        $contratos = DB::connection('old')->table('CONTRATOS')->orderBy('ID_CONTRATO')->get();

        foreach ($contratos as $index => $contrato) {
            $data = [
                'id' => $contrato->id_contrato,
                'tipo_id' => $this->getTipo($contrato),
                'moneda_id' => $this->getMoneda($contrato),
                'proveedor_id' => $this->getProveedor($contrato),
                'licitacion_id' => $contrato->nro_licitacion,
                'monto' => $contrato->monto,
                'fecha_alerta' => $contrato->estado_alerta,
                'fecha_inicio' => $contrato->fecha_inicio,
                'fecha_termino' => $contrato->fecha_termino,
                'fecha_aprobacion' => $contrato->fecha_aprobacion,
                'fecha_alerta_vencimiento' => $contrato->fecha_alerta_vencimiento,
                'fecha_vencimiento_boleta' => $contrato->fecha_vencimiento_boleta,
                'alerta_vencimiento_boleta' => $contrato->id_contrato,
                'numero_boleta_garantia' => $contrato->nro_boleta_garantia,
                'objeto' => $contrato->objeto_contrato,
                'estado_id' => ContratoEstado::INGRESADO,
                'contrato_id' => $contrato->id_contrato,
                'user_crea' => $contrato->id_contrato,
                'user_actualiza' => $contrato->id_contrato,
            ];

            dd($data);

            Contrato::create();
        }

        $maxId = $contratos->max('id_contrato');

        setStartValSequence('AREAS_ID_SEQ',$maxId);



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
        return $moneda->id;
    }

    function getProveedor($contrato){
        return $this->proveedores->where('rut',$contrato->rut_proveedor)->first()->id;
    }
}



