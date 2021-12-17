<?php

namespace App\DataTables;

use App\Models\Contrato;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ContratoDataTable extends DataTable
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

        $dataTable->addColumn('action', function(Contrato $contrato){

            $id = $contrato->id;

            return view('contratos.datatables_actions',compact('contrato','id'))->render();
        })
            ->editColumn('id',function (Contrato $contrato){

                $id = $contrato->id;

                //se debe crear la vista modal_detalles
                return view('contratos.modal_detalles',compact('contrato','id'))->render();

            })
            ->editColumn('licitacion.numero',function (Contrato $contrato){
                return $contrato->licitacion->numero ?? null;
            })
            ->editColumn('monto' ,function (Contrato  $contrato){
                return nfp($contrato->monto);
            })
            ->editColumn('saldo' ,function (Contrato  $contrato){
                return nfp($contrato->saldo);
            })
//            ->editColumn('tiene_detalles' ,function (Contrato  $contrato){
//                return $contrato->items->count() > 0 ? "Sí" : 'NO';
//            })
            ->editColumn('fecha_termino' ,function (Contrato  $contrato){
                if (is_null($contrato->fecha_termino)){  
                    return '';
                }else{
                    return $contrato->fecha_termino;
                }
            })

            ->editColumn('adjunto' ,function (Contrato  $contrato){

                $doc = $contrato->getLastDocumento();
                if ($doc){
                    return "<a href='".route('documentos.descargar',$doc->id)."' data-togle='tooltip' title='".$doc->file_name."'>".str_limit($doc->file_name,'10')."</a>";
                }
                else{
                    return "";
                }
            })


            ->rawColumns(['asignar','adjunto','action','id']);

        if (auth()->user()->can('Asignar Contratos a area')){
            $dataTable->editColumn('asignar_area' ,function (Contrato  $contrato){

                $id = $contrato->id;

                return view('contratos.columna_asignar_area',compact('contrato','id'));
            });
        }


       return $dataTable;

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Contrato $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contrato $model)
    {
        return $model->newQuery()->with(['tipo','userCrea','cargo.areas','userActualiza','estado','licitacion','moneda','proveedor','compras']);
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
//                'scrollX' => true,
//                'responsive' => true,
                'stateSave' => true,
                'buttons' => [
                    //['extend' => 'create', 'text' => '<i class="fa fa-plus"></i> <span class="d-none d-sm-inline">Crear</span>'],
                    ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> <span class="d-none d-sm-inline">Imprimir</span>'],
                    //['extend' => 'reload', 'text' => '<i class="fa fa-sync-alt"></i> <span class="d-none d-sm-inline">Recargar</span>'],
                    ['extend' => 'reset', 'text' => '<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'],
                    ['extend' => 'export',

                     'text' => '<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>'],
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
        $columns = [
//            'id',
            'id_mercado_publico',
            'proveedor' => ['data' => 'proveedor.razon_social','name' => 'proveedor.razon_social','orderable' => false],
            'licitacion' => ['data' => 'licitacion.numero','name' => 'licitacion.numero','orderable' => false],
            'monto',
            'fecha_inicio',
            'fecha_termino',
            'numero_boleta_garantia',
            'saldo' => ['searchable' => false,'orderable' => false],
            'adjunto' => ['searchable' => false,'orderable' => false,'exportable' => false],
            'cargo' => ['data' => 'cargo.nombre','name' => 'cargo.nombre','orderable' => false],
            'objeto' => ['searchable' => false,'orderable' => false],

        ];

        

        if (auth()->user()->can('Asignar Contratos a area')){
            $columns['asignar_area'] = ['searchable' => false,'orderable' => false];
        } else {
            $columns['cargo.nombre'] = ['searchable' => false,'orderable' => false];
        }



        return  $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'contratosdatatable_' . time();
    }
}
