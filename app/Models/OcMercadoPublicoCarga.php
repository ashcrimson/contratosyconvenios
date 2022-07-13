<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublicoCarga
 * @package App\Models
 * @version July 11, 2022, 11:04 pm CST
 *
 * @property \App\Models\User $user
 * @property string|\Carbon\Carbon $fecha_carga
 * @property string $nombre_archivio
 * @property string|\Carbon\Carbon $fecha_datos
 * @property integer $total_registros
 * @property integer $total_nuevos
 * @property integer $total_actualizados
 * @property string $tipo
 * @property integer $user_id
 */
class OcMercadoPublicoCarga extends Model
{
    use SoftDeletes;

    public $table = 'oc_mercado_publico_cargas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fecha_carga',
        'nombre_archivio',
        'fecha_datos',
        'total_registros',
        'total_nuevos',
        'total_actualizados',
        'tipo',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_carga' => 'datetime',
        'nombre_archivio' => 'string',
        'fecha_datos' => 'datetime',
        'total_registros' => 'integer',
        'total_nuevos' => 'integer',
        'total_actualizados' => 'integer',
        'tipo' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_carga' => 'required',
        'nombre_archivio' => 'required|string|max:245',
        'fecha_datos' => 'nullable',
        'total_registros' => 'required|integer',
        'total_nuevos' => 'required|integer',
        'total_actualizados' => 'required|integer',
        'tipo' => 'required|string|max:255',
        'user_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function scopeCargaOc($query)
    {
        $query->where('tipo', 'CARGA OC MERCADO PUBLICO DB')->orderByDesc('fecha_carga');
    }

}
