<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ContratoEstado
 * @package App\Models
 * @version July 24, 2021, 2:00 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $contratos
 * @property string $nombre
 */
class ContratoEstado extends Model
{
    use SoftDeletes;

    public $table = 'contratos_estados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const INGRESADO =   1;
    const ASIGNADO =    2;
    const FINALIZADO =  3;


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class, 'estado_id');
    }
}
