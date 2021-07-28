<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OrdenCompra
 * @package App\Models
 * @version July 28, 2021, 12:00 pm CST
 *
 * @property \App\Models\Contrato $contrato
 * @property \App\Models\OrdenesComprasEstado $estado
 * @property \App\Models\User $userCrea
 * @property \App\Models\User $userActualiza
 * @property \Illuminate\Database\Eloquent\Collection $ordenesComprasDetalles
 * @property integer $contrato_id
 * @property string $numero
 * @property string $fecha_envio
 * @property string $total
 * @property string $codigo
 * @property string $cantidad
 * @property string $descripcion
 * @property boolean $tiene_detalles
 * @property integer $estado_id
 * @property integer $user_crea
 * @property integer $user_actualiza
 */
class OrdenCompra extends Model
{
    use SoftDeletes;

    public $table = 'ordenes_compras';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contrato_id',
        'numero',
        'fecha_envio',
        'total',
        'codigo',
        'cantidad',
        'descripcion',
        'tiene_detalles',
        'estado_id',
        'user_crea',
        'user_actualiza'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contrato_id' => 'integer',
        'numero' => 'string',
        'fecha_envio' => 'string',
        'total' => 'string',
        'codigo' => 'string',
        'cantidad' => 'string',
        'descripcion' => 'string',
        'tiene_detalles' => 'boolean',
        'estado_id' => 'integer',
        'user_crea' => 'integer',
        'user_actualiza' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contrato_id' => 'required',
        'numero' => 'required|string|max:45',
        'fecha_envio' => 'required|string|max:45',
        'total' => 'nullable|string|max:45',
        'codigo' => 'required|string|max:45',
        'cantidad' => 'nullable|string|max:45',
        'descripcion' => 'nullable|string|max:45',
        'tiene_detalles' => 'nullable|boolean',
        'estado_id' => 'required',
        'user_crea' => 'required',
        'user_actualiza' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contrato()
    {
        return $this->belongsTo(\App\Models\Contrato::class, 'contrato_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\OrdenesComprasEstado::class, 'estado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userCrea()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_crea');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userActualiza()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_actualiza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ordenesComprasDetalles()
    {
        return $this->hasMany(\App\Models\OrdenesComprasDetalle::class, 'compra_id');
    }
}
