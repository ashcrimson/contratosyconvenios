<?php

namespace Database\Seeders;

use App\Models\Contrato;
use App\Models\ContratoEstado;
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
