<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OrdenCompraEstado
 * @package App\Models
 * @version July 28, 2021, 11:59 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $ordenesCompras
 * @property string $nombre
 */
class OrdenCompraEstado extends Model
{
    use SoftDeletes;

    public $table = 'ordenes_compras_estados';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
    public function ordenesCompras()
    {
        return $this->hasMany(\App\Models\OrdenesCompra::class, 'estado_id');
    }
}
