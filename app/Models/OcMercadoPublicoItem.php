<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublicoItem
 * @package App\Models
 * @version May 7, 2022, 3:50 pm CST
 *
 * @property \App\Models\OcMercadoPublico $ocMercadoPublico
 * @property integer $oc_mercado_publico_id
 * @property integer $correlativo
 * @property integer $codigo_categoria
 * @property string $categoria
 * @property integer $codigo_producto
 * @property string $producto
 * @property string $especificacion_comprador
 * @property string $especificacion_proveedor
 * @property integer $cantidad
 * @property integer $unidad
 * @property string $moneda
 * @property number $precio_neto
 * @property number $total_cargos
 * @property number $total_descuentos
 * @property number $total_impuestos
 * @property number $total
 */
class OcMercadoPublicoItem extends Model
{
    use SoftDeletes;

    public $table = 'oc_mercado_publico_items';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'oc_mercado_publico_id',
        'correlativo',
        'codigo_categoria',
        'categoria',
        'codigo_producto',
        'producto',
        'especificacion_comprador',
        'especificacion_proveedor',
        'cantidad',
        'unidad',
        'moneda',
        'precio_neto',
        'total_cargos',
        'total_descuentos',
        'total_impuestos',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'oc_mercado_publico_id' => 'integer',
        'correlativo' => 'integer',
        'codigo_categoria' => 'integer',
        'categoria' => 'string',
        'codigo_producto' => 'integer',
        'producto' => 'string',
        'especificacion_comprador' => 'string',
        'especificacion_proveedor' => 'string',
        'cantidad' => 'integer',
        'unidad' => 'integer',
        'moneda' => 'string',
        'precio_neto' => 'integer',
        'total_cargos' => 'integer',
        'total_descuentos' => 'integer',
        'total_impuestos' => 'integer',
        'total' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'oc_mercado_publico_id' => 'required|integer',
        'correlativo' => 'nullable',
        'codigo_categoria' => 'nullable',
        'categoria' => 'nullable|string',
        'codigo_producto' => 'nullable',
        'producto' => 'nullable|string',
        'especificacion_comprador' => 'nullable|string',
        'especificacion_proveedor' => 'nullable|string',
        'cantidad' => 'nullable|integer',
        'unidad' => 'nullable|integer',
        'moneda' => 'nullable|string',
        'precio_neto' => 'required|integer',
        'total_cargos' => 'required|integer',
        'total_descuentos' => 'required|integer',
        'total_impuestos' => 'required|integer',
        'total' => 'required|integer',
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
