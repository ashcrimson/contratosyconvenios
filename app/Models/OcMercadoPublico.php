<?php

namespace App\Models;

use App\Traits\HasBitacora;
use App\Traits\HasDocumento;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublico
 * @package App\Models
 * @version May 7, 2022, 9:52 am CST
 *
 * @property \App\Models\OrdenCompraTipo $codigoTipo
 * @property \App\Models\FormaPago $formaPago
 * @property \App\Models\DespachoTipo $tipoDespacho
 * @property \App\Models\UnidadMonetaria $tipoMoneda
 * @property \App\Models\OrdenCompraEstado $estado
 * @property \App\Models\Licitacion $licitacion
 * @property \App\Models\Contrato $contrato
 * @property \Illuminate\Database\Eloquent\Collection $ocMercadoPublicoFechas
 * @property string $codigo
 * @property string $nombre
 * @property integer $codigo_estado
 * @property integer $codigo_licitacion
 * @property string $descripcion
 * @property integer $codigo_tipo
 * @property integer $tipo_moneda
 * @property integer $codigo_estado_proveedor
 * @property integer $promedio_calificacion
 * @property integer $cantidad_evaluacion
 * @property number $descuentos
 * @property number $cargos
 * @property number $total_neto
 * @property number $porcentaje_iva
 * @property number $impuestos
 * @property number $total
 * @property string $financiamiento
 * @property string $pais
 * @property integer $tipo_despacho
 * @property integer $forma_pago
 * @property integer $contrato_id
 */
class OcMercadoPublico extends Model
{
    use SoftDeletes,HasDocumento,HasBitacora;

    public $table = 'oc_mercado_publico';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'codigo',
        'nombre',
        'codigo_estado',
        'nombre_estado',
        'codigo_licitacion',
        'descripcion',
        'codigo_tipo',
        'tipo_moneda',
        'codigo_estado_proveedor',
        'promedio_calificacion',
        'cantidad_evaluacion',
        'descuentos',
        'cargos',
        'total_neto',
        'porcentaje_iva',
        'impuestos',
        'total',
        'financiamiento',
        'pais',
        'tipo_despacho',
        'forma_pago',
        'estado_proveedor',
        'cantidad_items',
        'contrato_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'codigo_estado' => 'integer',
        'nombre_estado' => 'string',
        'codigo_licitacion' => 'integer',
        'descripcion' => 'string',
        'codigo_tipo' => 'integer',
        'tipo_moneda' => 'integer',
        'codigo_estado_proveedor' => 'integer',
        'promedio_calificacion' => 'integer',
        'cantidad_evaluacion' => 'integer',
        'descuentos' => 'integer',
        'cargos' => 'integer',
        'total_neto' => 'integer',
        'porcentaje_iva' => 'integer',
        'impuestos' => 'integer',
        'total' => 'integer',
        'financiamiento' => 'string',
        'pais' => 'string',
        'tipo_despacho' => 'integer',
        'forma_pago' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'codigo_estado' => 'nullable',
        'nombre_estado' => 'nullable|string',
        'codigo_licitacion' => 'nullable',
        'descripcion' => 'nullable|string',
        'codigo_tipo' => 'nullable|integer',
        'tipo_moneda' => 'nullable|integer',
        'codigo_estado_proveedor' => 'nullable|integer',
        'promedio_calificacion' => 'nullable|integer',
        'cantidad_evaluacion' => 'nullable|integer',
        'descuentos' => 'nullable|numeric',
        'cargos' => 'nullable|numeric',
        'total_neto' => 'nullable|numeric',
        'porcentaje_iva' => 'nullable|numeric',
        'impuestos' => 'nullable|numeric',
        'total' => 'nullable|numeric',
        'financiamiento' => 'nullable|string',
        'pais' => 'nullable|string|max:255',
        'tipo_despacho' => 'nullable|integer',
        'forma_pago' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function codigoTipo()
    {
        return $this->belongsTo(\App\Models\OrdenCompraTipo::class, 'codigo_tipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function formaPago()
    {
        return $this->belongsTo(\App\Models\FormaPago::class, 'forma_pago');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoDespacho()
    {
        return $this->belongsTo(\App\Models\DespachoTipo::class, 'tipo_despacho');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoMoneda()
    {
        return $this->belongsTo(\App\Models\UnidadMonetaria::class, 'tipo_moneda');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\OrdenCompraEstado::class, 'codigo_estado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function licitacion()
    {
        return $this->belongsTo(\App\Models\Licitacion::class, 'codigo_licitacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ocMercadoPublicoFechas()
    {
        return $this->hasOne(\App\Models\OcMercadoPublicoFechas::class, 'oc_mercado_publico_id');
    }

    public function ocMercadoPublicoComprador()
    {
        return $this->hasOne(\App\Models\OcmercadoPublicoComprador::class, 'oc_mercado_publico_id');
    }

    public function ocMercadoPublicoProveedor()
    {
        return $this->hasOne(\App\Models\OcMercadoPublicoProveedor::class, 'oc_mercado_publico_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contrato()
    {
        return $this->belongsTo(\App\Models\Contrato::class, 'contrato_id');
    }
}
