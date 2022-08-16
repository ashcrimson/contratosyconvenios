<?php

namespace App\Imports;

const CONTRATO_ID = 0;
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

class OcMercadoPublicoImport implements ToModel,WithBatchInserts,WithChunkReading,WithMultipleSheets
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

        if ($row[1]) {
            $this->ordenCompras[] = [$row[0], $row[1]];
            ++$this->numeroRegistros;
        }

    }

    /**
     * @inheritDoc
     */
    public function batchSize(): int
    {
        return 1000;
    }

    /**
     * @inheritDoc
     */
    public function chunkSize(): int
    {
        return 1000;
    }

    public function getListOrdenCompras()
    {
        return $this->ordenCompras;
    }

    public function getNumeroRegistos()
    {
        return $this->numeroRegistros;
    }

    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
}
