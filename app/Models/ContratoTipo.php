<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ContratoTipo
 * @package App\Models
 * @version July 24, 2021, 2:26 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $contratos
 * @property string $nombre
 */
class ContratoTipo extends Model
{
    use SoftDeletes;

    public $table = 'contratos_tipos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const CON_LICITACION =  1;
    const TRATO_DIRECTO =   2;


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
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class, 'tipo_id');
    }
}
