<?php

namespace App\Imports;

const CODIGO_OC = 1;

use App\Models\ClienteCarga;
use App\Models\DespachoTipo;
use App\Models\FormaPago;
use App\Models\Moneda;
use App\Models\OcMercadoPublico;
use App\Models\OcMercadoPublicoFechas;
use App\Models\OcMercadoPublicoItem;
use App\Models\OrdenCompraTipo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class OcMercadoPublicoImport implements ToModel
{

    use Importable;

    private $rows;
    private $nuevos;

    /**
     * OcMercadoPublicoImport constructor.
     * @param $carga
     */
    public function __construct()
    {
        $this->rows = 0;
        $this->nuevos = 0;
    }

    public function model(array $row)
    {
        ++$this->rows;

        $response = Http::get('http://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json',
            [
                'codigo' => $row[CODIGO_OC],
                'ticket' => 'B5E38DC9-CE33-43A4-A364-F5F6DAE82328'
            ]
        );

        if ($response->json()) {

            if (isset($response['Listado'])) {

                $obj = $response['Listado'][0];

                /**
                 * @var Moneda $moneda
                 */
                $moneda = Moneda::where('codigo', $obj['TipoMoneda'])->first();

                /**
                 * @var OrdenCompraTipo $compraTipo
                 */
                $compraTipo = OrdenCompraTipo::where('codigo', $obj['CodigoTipo'])->first();

                /**
                 * @var DespachoTipo $despachoTipo
                 */
                $despachoTipo = DespachoTipo::where('valor', $obj['TipoDespacho'])->first();

                /**
                 * @var FormaPago $formaPago
                 */
                $formaPago = FormaPago::where('valor', $obj['FormaPago'])->first();

                /**
                 * @var OcMercadoPublico $ocMercadoPublico
                 */
                $ocMercadoPublico = OcMercadoPublico::create([
                    'codigo' => $obj['Codigo'],
                    'nombre' => $obj['Nombre'],
                    'codigo_estado' => intval($obj['CodigoEstado']),
                    'codigo_licitacion' => intval($obj['CodigoLicitacion']),
                    'descripcion' => $obj['Descripcion'],
                    'codigo_tipo' => $compraTipo->id,
                    'tipo_moneda' => $moneda->id ?? 1,
                    'codigo_estado_proveedor' => intval($obj['CodigoEstadoProveedor']),
                    'promedio_calificacion' => intval($obj['PromedioCalificacion']),
                    'cantidad_evaluacion' => intval($obj['CantidadEvaluacion']),
                    'descuentos' => floatval($obj['Descuentos']),
                    'cargos' => floatval($obj['Cargos']),
                    'total_neto' => floatval($obj['TotalNeto']),
                    'porcentaje_iva' => floatval($obj['PorcentajeIva']),
                    'impuestos' => floatval($obj['Impuestos']),
                    'total' => floatval($obj['Total']),
                    'financiamiento' => floatval($obj['Financiamiento']),
                    'pais' => $obj['Pais'],
                    'tipo_despacho' => $despachoTipo->id,
                    'forma_pago' => $formaPago->id
                ]);

                /**
                 * @var OcMercadoPublicoFechas $ocMercadoPublicoFechas
                 */
                $ocMercadoPublicoFechas = OcMercadoPublicoFechas::create([
                    'oc_mercado_publico_id' => $ocMercadoPublico->id,
                    'fecha_creacion' => $obj['Fechas']['FechaCreacion'],
                    'fecha_envio' => $obj['Fechas']['FechaEnvio'],
                    'fecha_aceptacion' => $obj['Fechas']['FechaAceptacion'],
                    'fecha_cancelacion' => $obj['Fechas']['FechaCancelacion'],
                    'fecha_ultima_modificacion' => $obj['Fechas']['FechaUltimaModificacion'],
                ]);

                foreach ($obj['Items']['Listado'] as $item) {
                    /**
                     * @var OcMercadoPublicoItem $ocMercadoPublicoItem
                     */
                    $ocMercadoPublicoItem = OcMercadoPublicoItem::create([
                        'oc_mercado_publico_id' => $ocMercadoPublico->id,
                        'correlativo' => $item['Correlativo'],
                        'codigo_categoria' => $item['CodigoCategoria'],
                        'categoria' => $item['Categoria'],
                        'codigo_producto' => $item['CodigoProducto'],
                        'producto' => $item['Producto'],
                        'especificacion_comprador' => $item['EspecificacionComprador'],
                        'especificacion_proveedor' => $item['EspecificacionProveedor'],
                        'cantidad' => $item['Cantidad'],
                        'unidad' => $item['Unidad'],
                        'moneda' => $item['Moneda'],
                        'precio_neto' => $item['PrecioNeto'],
                        'total_cargos' => $item['TotalCargos'],
                        'total_descuentos' => $item['TotalDescuentos'],
                        'total_impuestos' => $item['TotalImpuestos'],
                        'total' => $item['Total'],
                    ]);
                }

            }

        }

    }

//    /**
//     * @inheritDoc
//     */
//    public function batchSize(): int
//    {
//        return 1000;
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function chunkSize(): int
//    {
//        return 1000;
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function sheets(): array
//    {
//        return [
//            0 => $this,
//        ];
//    }

//    public function getRowCount(): int
//    {
//        return $this->rows;
//    }
//
//    public function getNuevosCount(): int
//    {
//        return $this->nuevos;
//    }
}
