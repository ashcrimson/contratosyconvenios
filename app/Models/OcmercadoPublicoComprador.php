<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OcmercadoPublicoComprador
 * @package App\Models
 * @version May 23, 2022, 11:40 pm CST
 *
 * @property \App\Models\OcMercadoPublico $ocMercadoPublico
 * @property integer $oc_mercado_publico_id
 * @property string $codigo_organismo
 * @property string $nombre_organismo
 * @property string $rut_unidad
 * @property string $codigo_unidad
 * @property string $nombre_unidad
 * @property string $actividad
 * @property string $direccion_unidad
 * @property string $comuna_unidad
 * @property string $region_unidad
 * @property string $pais
 * @property string $nombre_contacto
 * @property string $cargo_contacto
 * @property string $fono_contacto
 * @property string $mail_contacto
 */
class OcmercadoPublicoComprador extends Model
{
    use SoftDeletes;

    public $table = 'oc_mercado_publico_comprador';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'oc_mercado_publico_id',
        'codigo_organismo',
        'nombre_organismo',
        'rut_unidad',
        'codigo_unidad',
        'nombre_unidad',
        'actividad',
        'direccion_unidad',
        'comuna_unidad',
        'region_unidad',
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
        'codigo_organismo' => 'string',
        'nombre_organismo' => 'string',
        'rut_unidad' => 'string',
        'codigo_unidad' => 'string',
        'nombre_unidad' => 'string',
        'actividad' => 'string',
        'direccion_unidad' => 'string',
        'comuna_unidad' => 'string',
        'region_unidad' => 'string',
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
        'codigo_organismo' => 'nullable|string|max:255',
        'nombre_organismo' => 'nullable|string|max:255',
        'rut_unidad' => 'nullable|string|max:255',
        'codigo_unidad' => 'nullable|string|max:255',
        'nombre_unidad' => 'nullable|string|max:255',
        'actividad' => 'nullable|string|max:255',
        'direccion_unidad' => 'nullable|string|max:255',
        'comuna_unidad' => 'nullable|string|max:255',
        'region_unidad' => 'nullable|string|max:255',
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
