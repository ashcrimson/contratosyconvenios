<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Licitacion
 * @package App\Models
 * @version July 21, 2021, 4:51 pm CST
 *
 * @property \App\Models\User $userCrea
 * @property \App\Models\User $userActualiza
 * @property \Illuminate\Database\Eloquent\Collection $contratos
 * @property string $numero
 * @property string $descripcion
 * @property number $presupuesto
 * @property integer $user_crea
 * @property integer $user_actualiza
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
        'presupuesto',
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
        'numero' => 'string',
        'descripcion' => 'string',
        'presupuesto' => 'decimal:0',
        'user_crea' => 'integer',
        'user_actualiza' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numero' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'presupuesto' => 'required|numeric',
    ];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class, 'licitacion_id');
    }
}
