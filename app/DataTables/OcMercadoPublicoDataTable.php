<?php

namespace App\DataTables;

use App\Models\OcMercadoPublico;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OcMercadoPublicoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

       return $dataTable->addColumn('action', function(OcMercadoPublico $ocMercadoPublico){

                 $id = $ocMercadoPublico->id;

                 return view('oc_mercado_publicos.datatables_actions',compact('ocMercadoPublico','id'))->render();
             })
             ->editColumn('id',function (OcMercadoPublico $ocMercadoPublico){

                 return $ocMercadoPublico->id;

                 //se debe crear la vista modal_detalles
                 //return view('oc_mercado_publicos.modal_detalles',compact('ocMercadoPublico'))->render();

             })
             ->editColumn('codigo_licitacion', function (OcMercadoPublico  $ocMercadoPublico) {
                 return $ocMercadoPublico->licitacion->numero ?? '';
             })
             ->editColumn('codigo_tipo', function (OcMercadoPublico  $ocMercadoPublico) {
                 return $ocMercadoPublico->codigoTipo->abreviacion ?? '';
             })
             ->editColumn('tipo_despacho', function (OcMercadoPublico  $ocMercadoPublico) {
                 return $ocMercadoPublico->tipoDespacho->descripcion ?? '';
             })
             ->editColumn('contrato', function (OcMercadoPublico  $ocMercadoPublico) {
                 return $ocMercadoPublico->contrato->id_mercado_publico ?? '';
             })
             ->editColumn('contrato_id_mercado', function (OcMercadoPublico  $ocMercadoPublico) {
                 return $ocMercadoPublico->contrato->id_mercado_publico ?? '';
             })
             ->rawColumns(['action','id']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OcMercadoPublico $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OcMercadoPublico $model)
    {
        return $model->newQuery()->with(['contrato']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->ajax([
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data);   }"
            ])
            ->parameters([
                'dom'     => '
                                    <"row mb-2"
                                        <"col-sm-12 col-md-6" B>
                                        <"col-sm-12 col-md-6" f>
                                    >
                                    rt
                                    <"row"
                                        <"col-sm-6 order-2 order-sm-1" ip>
                                        <"col-sm-6 order-1 order-sm-2 text-right" l>

                                    >',
                'order'   => [[0, 'desc']],
                'language' => ['url' => asset('js/SpanishDataTables.json')],
                //'scrollX' => false,
                'responsive' => true,
                'stateSave' => true,
                'buttons' => [
                    //['extend' => 'create', 'text' => '<i class="fa fa-plus"></i> <span class="d-none d-sm-inline">Crear</span>'],
                    ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> <span class="d-none d-sm-inline">Imprimir</span>'],
                    //['extend' => 'reload', 'text' => '<i class="fa fa-sync-alt"></i> <span class="d-none d-sm-inline">Recargar</span>'],
                    ['extend' => 'reset', 'text' => '<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'],
                    ['extend' => 'export', 'text' => '<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>'],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'codigo',
            'nombre_estado',
            'codigo_licitacion',
            'contrato' => ['data' => 'contrato', 'name' => 'contrato', 'orderable' => 'false', 'searchable' => 'false'],
            'codigo_tipo',
            'tipo_despacho',

            'contrato_id_mercado' => ['data' => 'contrato_id_mercado','name' => 'contrato.id_mercado_publico','visible' => false,'printable' => false, 'exportable' => false]

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'oc_mercado_publicosdatatable_' . time();
    }
}
