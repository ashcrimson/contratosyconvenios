<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Contrato
 * @package App\Models
 * @version July 24, 2021, 2:32 pm CST
 *
 * @property \App\Models\Area $area
 * @property \App\Models\ContratosEstado $estado
 * @property \App\Models\Licitacione $licitacion
 * @property \App\Models\Moneda $moneda
 * @property \App\Models\Proveedore $proveedor
 * @property \App\Models\ContratosTipo $tipo
 * @property \App\Models\User $userCrea
 * @property \App\Models\User $userActualiza
 * @property \Illuminate\Database\Eloquent\Collection $area2s
 * @property \Illuminate\Database\Eloquent\Collection $contratosItems
 * @property \Illuminate\Database\Eloquent\Collection $ordenesCompras
 * @property integer $tipo_id
 * @property integer $moneda_id
 * @property integer $proveedor_id
 * @property integer $licitacion_id
 * @property string $monto
 * @property string $fecha_alerta
 * @property string $fecha_inicio
 * @property string $fecha_termino
 * @property string $fecha_aprobacion
 * @property string $fecha_alerta_vencimiento
 * @property string $objeto
 * @property string $numero_boleta_garantia
 * @property string $fecha_vencimiento_boleta
 * @property string $alerta_vencimiento_boleta
 * @property integer $estado_id
 * @property integer $area_id
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



    public $fillable = [
        'tipo_id',
        'moneda_id',
        'proveedor_id',
        'licitacion_id',
        'monto',
        'fecha_alerta',
        'fecha_inicio',
        'fecha_termino',
        'fecha_aprobacion',
        'fecha_alerta_vencimiento',
        'objeto',
        'numero_boleta_garantia',
        'fecha_vencimiento_boleta',
        'alerta_vencimiento_boleta',
        'estado_id',
        'area_id',
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
        'moneda_id' => 'integer',
        'proveedor_id' => 'integer',
        'licitacion_id' => 'integer',
        'monto' => 'string',
        'fecha_alerta' => 'date',
        'fecha_inicio' => 'date',
        'fecha_termino' => 'date',
        'fecha_aprobacion' => 'date',
        'fecha_alerta_vencimiento' => 'date',
        'objeto' => 'string',
        'numero_boleta_garantia' => 'string',
        'fecha_vencimiento_boleta' => 'date',
        'alerta_vencimiento_boleta' => 'date',
        'estado_id' => 'integer',
        'area_id' => 'integer',
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
        'moneda_id' => 'required|integer',
        'proveedor_id' => 'required|integer',
        'licitacion_id' => 'nullable',
        'monto' => 'required|string|max:45',
        'fecha_alerta' => 'required',
        'fecha_inicio' => 'required',
        'fecha_termino' => 'required',
        'fecha_aprobacion' => 'required',
        'fecha_alerta_vencimiento' => 'required',
        'objeto' => 'required|string',
        'numero_boleta_garantia' => 'required|string|max:45',
        'fecha_vencimiento_boleta' => 'required',
        'alerta_vencimiento_boleta' => 'required',
        'estado_id' => 'required',
        'area_id' => 'required',
        'user_crea' => 'required',
        'user_actualiza' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function area()
    {
        return $this->belongsTo(\App\Models\Area::class, 'area_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\ContratosEstado::class, 'estado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function licitacion()
    {
        return $this->belongsTo(\App\Models\Licitacione::class, 'licitacion_id');
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
        return $this->belongsTo(\App\Models\Proveedore::class, 'proveedor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipo()
    {
        return $this->belongsTo(\App\Models\ContratosTipo::class, 'tipo_id');
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
    public function area2s()
    {
        return $this->belongsToMany(\App\Models\Area::class, 'contrato_has_area');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratosItems()
    {
        return $this->hasMany(\App\Models\ContratosItem::class, 'contrato_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ordenesCompras()
    {
        return $this->hasMany(\App\Models\OrdenesCompra::class, 'contrato_id');
    }
}
