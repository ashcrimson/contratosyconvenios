<?php

namespace App\DataTables;

use App\Models\OcMercadoPublicoTipoOrdenCompra;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OcMercadoPublicoTipoOrdenCompraDataTable extends DataTable
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

       return $dataTable->addColumn('action', function(OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra){

                 $id = $ocMercadoPublicoTipoOrdenCompra->id;

                 return view('oc_mercado_publico_tipo_orden_compras.datatables_actions',compact('ocMercadoPublicoTipoOrdenCompra','id'))->render();
             })
             ->editColumn('id',function (OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra){

                 return $ocMercadoPublicoTipoOrdenCompra->id;

                 //se debe crear la vista modal_detalles
                 //return view('oc_mercado_publico_tipo_orden_compras.modal_detalles',compact('ocMercadoPublicoTipoOrdenCompra'))->render();

             })
             ->rawColumns(['action','id']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OcMercadoPublicoTipoOrdenCompra $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OcMercadoPublicoTipoOrdenCompra $model)
    {
        return $model->newQuery();
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
            'abreviacion',
            'descripcion'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'oc_mercado_publico_tipo_orden_comprasdatatable_' . time();
    }
}
