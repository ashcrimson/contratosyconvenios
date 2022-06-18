<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublicoTipoMoneda
 * @package App\Models
 * @version June 18, 2022, 9:55 am CST
 *
 * @property string $valor
 * @property string $descripcion
 */
class OcMercadoPublicoTipoMoneda extends Model
{
    use SoftDeletes;

    public $table = 'oc_mp_tipo_moneda';

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
        'valor' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'valor' => ['required','string','max:255','unique:oc_mp_tipo_moneda'],
        'descripcion' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * Validation rules update
     *
     * @var array
     */
    public static $rulesUpdate = [
        'valor' => 'required|string|max:255',
        'descripcion' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

}
