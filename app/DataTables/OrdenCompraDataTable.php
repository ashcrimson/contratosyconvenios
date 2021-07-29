<?php

namespace App\DataTables;

use App\Models\OrdenCompra;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OrdenCompraDataTable extends DataTable
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

       return $dataTable->addColumn('action', function(OrdenCompra $ordenCompra){

                 $id = $ordenCompra->id;

                 return view('orden_compras.datatables_actions',compact('ordenCompra','id'))->render();
             })
             ->editColumn('id',function (OrdenCompra $ordenCompra){

                 $id = $ordenCompra->id;
                 return view('orden_compras.modal_detalles',compact('ordenCompra','id'))->render();

             })
           ->editColumn('total' ,function (OrdenCompra  $compra){
               return dvs().nfp($compra->total);
           })
           ->editColumn('fecha_envio' ,function (OrdenCompra  $compra){
               return $compra->fecha_envio->format('d/m/Y');
           })
             ->rawColumns(['action','id']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OrdenCompra $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OrdenCompra $model)
    {
        return $model->newQuery()->with(['contrato','estado']);
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
            'id',
            'contrato' => ['data' => 'contrato.id_mercado_publico','name' => 'contrato.id_mercado_publico'],
            'numero',
            'fecha_envio',
            'total',
            'estado' => ['data' => 'estado.nombre','name' => 'estado.nombre'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'orden_comprasdatatable_' . time();
    }
}
