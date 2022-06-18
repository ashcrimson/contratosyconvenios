<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublicoTipoOrdenCompra
 * @package App\Models
 * @version June 18, 2022, 9:20 am CST
 *
 * @property integer $codigo
 * @property string $abreviacion
 * @property string $descripcion
 */
class OcMercadoPublicoTipoOrdenCompra extends Model
{
    use SoftDeletes;

    public $table = 'oc_mp_tipo_orden_compra';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'codigo',
        'abreviacion',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'integer',
        'abreviacion' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => ['required', 'integer', 'unique:oc_mp_tipo_orden_compra'],
        'abreviacion' => 'required|string|max:255',
        'descripcion' => 'required|string|max:3000',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * Validation rules Update
     *
     * @var array
     */
    public static $rulesUpdate = [
        'codigo' => 'required|integer',
        'abreviacion' => 'required|string|max:255',
        'descripcion' => 'required|string|max:3000',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

}
