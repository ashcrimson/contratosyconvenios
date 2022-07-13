<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublicoCargaDetalle
 * @package App\Models
 * @version July 13, 2022, 8:50 am CST
 *
 * @property \App\Models\OcMercadoPublicoCarga $carga
 * @property string $orden_compra
 * @property string $contrato_id
 * @property string $estado_consulta
 * @property string $detalle_consulta
 * @property integer $carga_id
 */
class OcMercadoPublicoCargaDetalle extends Model
{
    use SoftDeletes;

    public $table = 'oc_merc_pub_cargas_detalles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'orden_compra',
        'contrato_id',
        'estado_consulta',
        'detalle_consulta',
        'carga_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'orden_compra' => 'string',
        'contrato_id' => 'string',
        'estado_consulta' => 'string',
        'detalle_consulta' => 'string',
        'carga_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'orden_compra' => 'nullable|string|max:3000',
        'contrato_id' => 'nullable|string|max:255',
        'estado_consulta' => 'nullable|string|max:255',
        'detalle_consulta' => 'nullable|string|max:3000',
        'carga_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function carga()
    {
        return $this->belongsTo(\App\Models\OcMercadoPublicoCarga::class, 'carga_id');
    }
}
