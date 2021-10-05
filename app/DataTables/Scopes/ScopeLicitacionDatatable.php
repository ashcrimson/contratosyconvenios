<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ScopeLicitacionDatatable implements DataTableScope
{

    public $cargos;
    public $areas;

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if (!is_null($this->cargos)){
            if (is_array($this->cargos)){

                $query->whereHas('contratos',function ($queryContrato){
                    $queryContrato->whereIn('cargo_id',$this->cargos);
                });
            }else{

                $query->whereHas('contratos',function ($queryContrato){
                    $queryContrato->where('cargo_id',$this->cargos);
                });

            }
        }

        if (!is_null($this->areas)){
            if (is_array($this->areas)){

                $query->whereHas('contratos',function ($queryContrato){
                    $queryContrato->whereIn('area_id',$this->areas);
                });
            }else{

                $query->whereHas('contratos',function ($queryContrato){
                    $queryContrato->where('area_id',$this->areas);
                });

            }
        }
    }
}
