<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ContratoItem
 * @package App\Models
 * @version September 4, 2021, 7:29 pm CST
 *
 * @property \App\Models\Contrato $contrato
 * @property \Illuminate\Database\Eloquent\Collection $ordenesComprasDetalles
 * @property integer $contrato_id
 * @property string $codigo
 * @property string $descripcion
 * @property number $cantidad_total
 * @property number $precio
 * @property string $grupo
 * @property string $presentacion_prod_soli
 * @property string $f_f
 * @property string $desc_tec_prod_ofertado
 * @property string $u_entrega_oferente
 * @property string $saldo
 */
class ContratoItem extends Model
{
    use SoftDeletes;

    public $table = 'contratos_items';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $appends = ['text'];

    public $fillable = [
        'contrato_id',
        'codigo',
        'descripcion',
        'cantidad_total',
        'precio',
        'grupo',
        'presentacion_prod_soli',
        'f_f',
        'desc_tec_prod_ofertado',
        'u_entrega_oferente',
        'saldo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contrato_id' => 'integer',
        'codigo' => 'string',
        'descripcion' => 'string',
        'cantidad_total' => 'decimal:2',
        'precio' => 'decimal:2',
        'grupo' => 'string',
        'presentacion_prod_soli' => 'string',
        'f_f' => 'string',
        'desc_tec_prod_ofertado' => 'string',
        'u_entrega_oferente' => 'string',
        'saldo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contrato_id' => 'required',
        'codigo' => 'required|string|max:45',
        'descripcion' => 'required|string|max:255',
        'cantidad_total' => 'required|numeric',
        'precio' => 'required|numeric',
        'grupo' => 'required|string|max:255',
        'presentacion_prod_soli' => 'nullable|string|max:255',
        'f_f' => 'nullable|string|max:255',
        'desc_tec_prod_ofertado' => 'nullable|string|max:255',
        'u_entrega_oferente' => 'nullable|string|max:255',
        'saldo' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contrato()
    {
        return $this->belongsTo(\App\Models\Contrato::class, 'contrato_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ordenesComprasDetalles()
    {
        return $this->hasMany(\App\Models\OrdenesComprasDetalle::class, 'item_id');
    }

    public function getTextAttribute()
    {
        return $this->codigo." / ".$this->descripcion." / ".$this->desc_tec_prod_ofertado;
    }
}
