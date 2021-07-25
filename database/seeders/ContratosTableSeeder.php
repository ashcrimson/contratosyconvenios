<?php

namespace Database\Seeders;

use App\Models\Contrato;
use App\Models\ContratoEstado;
use App\Models\ContratoTipo;
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


        \DB::table('contratos')->delete();

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
        return $moneda->id ?? null;
    }

    function getProveedor($contrato){
        return $this->proveedores->where('rut',$contrato->rut_proveedor)->first()->id;
    }

    function getLicitacion($contrato){
//        dd($contrato->nro_licitacion);
        return $this->licitaciones->where('numero',$contrato->nro_licitacion)->first()->id ?? null;
    }
}



