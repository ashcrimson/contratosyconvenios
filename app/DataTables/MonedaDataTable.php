<?php

namespace App\DataTables;

use App\Models\Moneda;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MonedaDataTable extends DataTable
{


    /**
     * MonedaDataTable constructor.
     * @param $dailyIndicators
     */
    public function __construct()
    {
//        setConfigDailyIndicators();
    }


    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

       return $dataTable->addColumn('action', function(Moneda $moneda){

                 $id = $moneda->id;

                 return view('monedas.datatables_actions',compact('moneda','id'))->render();
             })
             ->editColumn('id',function (Moneda $moneda){

                 return $moneda->id;

                 //se debe crear la vista modal_detalles
                 //return view('monedas.modal_detalles',compact('moneda'))->render();

             })
           ->editColumn('ultima_actualizacion',function (Moneda $moneda){

                 return $moneda->getUltimaActualizacionFecha();


             })
           
           ->editColumn('al_dia',function (Moneda $moneda){

               return $moneda->es_valor_dia;


           })

             ->rawColumns(['action','id']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Moneda $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Moneda $model)
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
                "order" => [[ 3, "desc" ]],
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
            Column::make('id'),
            Column::make('nombre'),
            Column::make('codigo'),
            Column::make('equivalencia'),
            Column::make('al_dia')->searchable(false)->orderable(false),
            Column::make('ultima_actualizacion')->searchable(false)->orderable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'monedasdatatable_' . time();
    }
}
