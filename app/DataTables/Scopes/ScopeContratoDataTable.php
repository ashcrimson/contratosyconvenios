<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ScopeContratoDataTable implements DataTableScope
{

    public $areas;
    public $cargos;

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if ($this->areas){
            if (is_array($this->areas)){

                $query->whereIn('area_asignado',$this->areas);
            }else{
                $query->where('area_asignado',$this->areas);

            }
        }

        if ($this->cargos){
            if (is_array($this->cargos)){

                $query->whereIn('cargo_id',$this->cargos);
            }else{
                $query->where('cargo_id',$this->cargos);

            }
        }
    }
}
