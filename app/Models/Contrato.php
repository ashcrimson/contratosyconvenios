<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Contrato
 * @package App\Models
 * @version July 24, 2021, 7:30 pm CST
 *
 * @property \App\Models\Cargo $cargo
 * @property \App\Models\ContratoEstado $estado
 * @property \App\Models\Licitacion $licitacion
 * @property \App\Models\Moneda $moneda
 * @property \App\Models\Proveedor $proveedor
 * @property \App\Models\ContratoTipo $tipo
 * @property \App\Models\User $userCrea
 * @property \App\Models\User $userActualiza
 * @property \Illuminate\Database\Eloquent\Collection $areas
 * @property \Illuminate\Database\Eloquent\Collection $contratosItems
 * @property \Illuminate\Database\Eloquent\Collection $ordenesCompras
 * @property integer $tipo_id
 * @property integer $licitacion_id
 * @property integer $proveedor_id
 * @property integer $cargo_id
 * @property integer $moneda_id
 * @property number $monto
 * @property number $saldo
 * @property boolean $estado_alerta
 * @property string $fecha_inicio
 * @property string $fecha_termino
 * @property string $fecha_aprobacion
 * @property string $fecha_alerta_vencimiento
 * @property string $objeto
 * @property string $numero_boleta_garantia
 * @property string $fecha_vencimiento_boleta
 * @property string $alerta_vencimiento_boleta
 * @property number $monto_boleta_garantia
 * @property string $id_mercado_publico
 * @property integer $estado_id
 * @property integer $user_crea
 * @property integer $user_actualiza
 */
class Contrato extends Model
{
    use SoftDeletes;

    public $table = 'contratos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['saldo'];

    public $fillable = [
        'tipo_id',
        'licitacion_id',
        'proveedor_id',
        'cargo_id',
        'moneda_id',
        'monto',
        'estado_alerta',
        'fecha_inicio',
        'fecha_termino',
        'fecha_aprobacion',
        'fecha_alerta_vencimiento',
        'objeto',
        'numero_boleta_garantia',
        'fecha_vencimiento_boleta',
        'alerta_vencimiento_boleta',
        'monto_boleta_garantia',
        'id_mercado_publico',
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
        'tipo_id' => 'integer',
        'licitacion_id' => 'integer',
        'proveedor_id' => 'integer',
        'cargo_id' => 'integer',
        'moneda_id' => 'integer',
        'monto' => 'decimal:0',
        'estado_alerta' => 'boolean',
        'fecha_inicio' => 'date',
        'fecha_termino' => 'date',
        'fecha_aprobacion' => 'date',
        'fecha_alerta_vencimiento' => 'date',
        'objeto' => 'string',
        'numero_boleta_garantia' => 'string',
        'fecha_vencimiento_boleta' => 'date',
        'alerta_vencimiento_boleta' => 'date',
        'monto_boleta_garantia' => 'decimal:0',
        'id_mercado_publico' => 'string',
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
        'tipo_id' => 'required|integer',
        'licitacion_id' => 'nullable',
        'proveedor_id' => 'required|integer',
        'cargo_id' => 'required',
        'moneda_id' => 'required|integer',
        'monto' => 'required|numeric',
        'estado_alerta' => 'required|boolean',
        'fecha_inicio' => 'required',
        'fecha_termino' => 'required',
        'fecha_aprobacion' => 'required',
        'fecha_alerta_vencimiento' => 'required',
        'objeto' => 'required|string',
        'numero_boleta_garantia' => 'required|string|max:45',
        'fecha_vencimiento_boleta' => 'required',
        'alerta_vencimiento_boleta' => 'required',
        'monto_boleta_garantia' => 'required|numeric',
        'id_mercado_publico' => 'required|string|max:255',
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
    public function cargo()
    {
        return $this->belongsTo(\App\Models\Cargo::class, 'cargo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\ContratoEstado::class, 'estado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function licitacion()
    {
        return $this->belongsTo(\App\Models\Licitacion::class, 'licitacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function moneda()
    {
        return $this->belongsTo(\App\Models\Moneda::class, 'moneda_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function proveedor()
    {
        return $this->belongsTo(\App\Models\Proveedor::class, 'proveedor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipo()
    {
        return $this->belongsTo(\App\Models\ContratoTipo::class, 'tipo_id');
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function areas()
    {
        return $this->belongsToMany(\App\Models\Area::class, 'contrato_has_area');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratosItems()
    {
        return $this->hasMany(\App\Models\ContratoItem::class, 'contrato_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ordenesCompras()
    {
        return $this->hasMany(\App\Models\OrdenCompra::class, 'contrato_id');
    }

    public function getSaldoAttribute()
    {
        return $this->monto;
    }

    public function getMontoBoletaGarantiaFAttribute()
    {
        return $this->moneda->simbolo." ".nfp($this->monto_boleta_garantia);
    }
}
