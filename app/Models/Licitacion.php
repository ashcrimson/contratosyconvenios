<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Licitacion
 * @package App\Models
 * @version July 21, 2021, 3:15 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $contratos
 * @property string $numero
 * @property string $descripcion
 * @property number $presupuesto
 */
class Licitacion extends Model
{
    use SoftDeletes;

    public $table = 'licitaciones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'numero',
        'descripcion',
        'presupuesto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numero' => 'string',
        'descripcion' => 'string',
        'presupuesto' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numero' => 'required|string|max:45',
        'descripcion' => 'required|string',
        'presupuesto' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class, 'licitacion_id');
    }
}
