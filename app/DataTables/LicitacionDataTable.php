<?php

namespace App\DataTables;

use App\Models\Licitacion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LicitacionDataTable extends DataTable
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

       return $dataTable->addColumn('action', function(Licitacion $licitacion){

                 $id = $licitacion->id;

                 return view('licitaciones.datatables_actions',compact('licitacion','id'))->render();
             })
             ->editColumn('id',function (Licitacion $licitacion){

                 return $licitacion->id;

                 //se debe crear la vista modal_detalles
                 //return view('licitacions.modal_detalles',compact('licitacion'))->render();

             })
                ->editColumn('user_crea.name',function (Licitacion $licitacion){
                    return $licitacion->userCrea->name ?? '';
                })
               ->editColumn('user_actualiza.name',function (Licitacion $licitacion){
                   return $licitacion->userActualiza->name ?? '';
               })
           ->editColumn('presupuesto',function (Licitacion $licitacion){
               return dvs().nfp($licitacion->presupuesto);
           })
           ->editColumn('adjunto' ,function (Licitacion  $licitacion){

               $documentos = $licitacion->documentos;

               return view('partials.listado_simple_documentos',compact('documentos'));
           })
           ->rawColumns(['adjunto','action','id']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Licitacion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Licitacion $model)
    {
        return $model->newQuery()->with(['userCrea','userActualiza']);
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
//                'stateSave' => true,
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
            'numero',
            'descripcion',
            'presupuesto',
            'adjunto' => ['searchable' => false,'orderable' => false],
            'creado_por' => ['data' => 'user_crea.name','name' => 'userCrea.name','orderable' => false],
            'actualizado_por'  => ['data' => 'user_actualiza.name','name' => 'userActualiza.name','orderable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'licitacionsdatatable_' . time();
    }
}
