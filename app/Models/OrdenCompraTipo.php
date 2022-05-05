<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OrdenCompraTipo
 * @package App\Models
 * @version May 5, 2022, 10:25 am CST
 *
 * @property integer $codigo
 * @property string $abreviacion
 * @property string $descripcion
 */
class OrdenCompraTipo extends Model
{
    use SoftDeletes;

    public $table = 'orden_compra_tipos';
    
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
        'codigo' => 'required|integer',
        'abreviacion' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
