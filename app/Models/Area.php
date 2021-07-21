<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Area
 * @package App\Models
 * @version July 20, 2021, 8:35 pm CST
 *
 * @property \App\Models\Cargo $cargo
 * @property \Illuminate\Database\Eloquent\Collection $contratos
 * @property \Illuminate\Database\Eloquent\Collection $contrato1s
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property integer $cargo_id
 * @property string $nombre
 */
class Area extends Model
{
    use SoftDeletes;

    public $table = 'areas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cargo_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cargo_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cargo_id' => 'required',
        'nombre' => 'required|string|max:255',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cargo()
    {
        return $this->belongsTo(\App\Models\Cargo::class, 'cargo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function contratos()
    {
        return $this->belongsToMany(\App\Models\Contrato::class, 'contrato_has_area');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'area_id');
    }
}
