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

    private $ordenCompras;
    private $numeroRegistros;

    /**
     * OcMercadoPublicoImport constructor.
     * @param $carga
     */
    public function __construct()
    {
        $this->ordenCompras = [];
        $this->numeroRegistros = 0;
    }

    public function model(array $row)
    {

        $this->ordenCompras[] = $row[CODIGO_OC];
//        ++$this->numeroRegistros;

    }

    public function getListOrdenCompras()
    {
        return $this->ordenCompras;
    }

    public function getNumeroRegistos()
    {
        return $this->numeroRegistros;
    }

}
