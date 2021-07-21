<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Proveedor
 * @package App\Models
 * @version July 21, 2021, 11:01 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $contratos
 * @property string $rut
 * @property string $razon_social
 * @property string $nombre_fantasia
 * @property string $telefono
 * @property string $email
 * @property string $comuna
 * @property string $direccion
 */
class Proveedor extends Model
{
    use SoftDeletes;

    public $table = 'proveedores';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'rut',
        'razon_social',
        'nombre_fantasia',
        'telefono',
        'email',
        'comuna',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rut' => 'string',
        'razon_social' => 'string',
        'nombre_fantasia' => 'string',
        'telefono' => 'string',
        'email' => 'string',
        'comuna' => 'string',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rut' => 'required|string|max:255',
        'razon_social' => 'required|string|max:255',
        'nombre_fantasia' => 'required|string|max:255',
        'telefono' => 'required|string|max:30',
        'email' => 'required|string|max:255',
        'comuna' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class, 'proveedor_id');
    }
}
