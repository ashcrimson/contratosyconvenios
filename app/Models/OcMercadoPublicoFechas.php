<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublicoFechas
 * @package App\Models
 * @version May 7, 2022, 9:52 am CST
 *
 * @property \App\Models\OcMercadoPublico $ocMercadoPublico
 * @property integer $oc_mercado_publico_id
 * @property string $fecha_creacion
 * @property string $fecha_envio
 * @property string $fecha_aceptacion
 * @property string $fecha_cancelacion
 * @property string $fecha_ultima_modificacion
 */
class OcMercadoPublicoFechas extends Model
{
    use SoftDeletes;

    public $table = 'oc_mercado_publico_fechas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'oc_mercado_publico_id',
        'fecha_creacion',
        'fecha_envio',
        'fecha_aceptacion',
        'fecha_cancelacion',
        'fecha_ultima_modificacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'oc_mercado_publico_id' => 'integer',
        'fecha_creacion' => 'date',
        'fecha_envio' => 'date',
        'fecha_aceptacion' => 'date',
        'fecha_cancelacion' => 'date',
        'fecha_ultima_modificacion' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'oc_mercado_publico_id' => 'required|integer',
        'fecha_creacion' => 'nullable',
        'fecha_envio' => 'nullable',
        'fecha_aceptacion' => 'nullable',
        'fecha_cancelacion' => 'nullable',
        'fecha_ultima_modificacion' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ocMercadoPublico()
    {
        return $this->belongsTo(\App\Models\OcMercadoPublico::class, 'oc_mercado_publico_id');
    }
}
