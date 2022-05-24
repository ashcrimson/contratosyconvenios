<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcMercadoPublicoProveedor
 * @package App\Models
 * @version May 23, 2022, 11:58 pm CST
 *
 * @property \App\Models\OcMercadoPublico $ocMercadoPublico
 * @property integer $oc_mercado_publico_id
 * @property string $codigo
 * @property string $nombre
 * @property string $actividad
 * @property string $codigo_sucursal
 * @property string $nombre_sucursal
 * @property string $rut_sucursal
 * @property string $direccion
 * @property string $comuna
 * @property string $region
 * @property string $pais
 * @property string $nombre_contacto
 * @property string $cargo_contacto
 * @property string $fono_contacto
 * @property string $mail_contacto
 */
class OcMercadoPublicoProveedor extends Model
{
    use SoftDeletes;

    public $table = 'oc_mercado_publico_proveedor';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'oc_mercado_publico_id',
        'codigo',
        'nombre',
        'actividad',
        'codigo_sucursal',
        'nombre_sucursal',
        'rut_sucursal',
        'direccion',
        'comuna',
        'region',
        'pais',
        'nombre_contacto',
        'cargo_contacto',
        'fono_contacto',
        'mail_contacto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'oc_mercado_publico_id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'actividad' => 'string',
        'codigo_sucursal' => 'string',
        'nombre_sucursal' => 'string',
        'rut_sucursal' => 'string',
        'direccion' => 'string',
        'comuna' => 'string',
        'region' => 'string',
        'pais' => 'string',
        'nombre_contacto' => 'string',
        'cargo_contacto' => 'string',
        'fono_contacto' => 'string',
        'mail_contacto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'oc_mercado_publico_id' => 'required|integer',
        'codigo' => 'nullable|string|max:255',
        'nombre' => 'nullable|string|max:255',
        'actividad' => 'nullable|string|max:255',
        'codigo_sucursal' => 'nullable|string|max:255',
        'nombre_sucursal' => 'nullable|string|max:255',
        'rut_sucursal' => 'nullable|string|max:255',
        'direccion' => 'nullable|string|max:255',
        'comuna' => 'nullable|string|max:255',
        'region' => 'nullable|string|max:255',
        'pais' => 'nullable|string|max:255',
        'nombre_contacto' => 'nullable|string|max:255',
        'cargo_contacto' => 'nullable|string|max:255',
        'fono_contacto' => 'nullable|string|max:255',
        'mail_contacto' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ocMercadoPublico()
    {
        return $this->belongsTo(\App\Models\OcMercadoPublico::class, 'oc_mercado_publico_id');
    }
}
