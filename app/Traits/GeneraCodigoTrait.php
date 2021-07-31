<?php


namespace App\Traits;


use Carbon\Carbon;

trait GeneraCodigoTrait
{


    /**
     * HasCodigo constructor.
     */
    public function __construct()
    {

    }

    public function getCodigo($model,$cantidadCeros = 4)
    {
        return prefijoCeros($this->getCorrelativo($model),$cantidadCeros).Carbon::now()->year;
    }

    public function getCorrelativo($model)
    {

        $correlativo = $model::withTrashed()->whereRaw('year(created_at) ='.Carbon::now()->year)->max('correlativo');


        if ($correlativo)
            return $correlativo+1;

        return 1;
    }


}
