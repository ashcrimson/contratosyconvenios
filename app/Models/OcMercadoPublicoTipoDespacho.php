<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublicoTipoDespacho
 * @package App\Models
 * @version June 19, 2022, 11:09 pm CST
 *
 * @property integer $valor
 * @property string $descripcion
 */
class OcMercadoPublicoTipoDespacho extends Model
{
    use SoftDeletes;

    public $table = 'oc_mp_tipo_despacho';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'valor',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valor' => 'integer',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'valor' => ['required','integer','unique:oc_mp_tipo_despacho'],
        'descripcion' => 'required|string|max:300',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rulesUpdate = [
        'valor' => 'required|integer',
        'descripcion' => 'required|string|max:300',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
