<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Intervencion
 * @package App\Models
 * @version September 8, 2021, 9:12 am CST
 *
 * @property string $codigo
 * @property string $descripcion
 */
class Intervencion extends Model
{
    use SoftDeletes;

    public $table = 'intervencions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'codigo',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required'
    ];

    
}
