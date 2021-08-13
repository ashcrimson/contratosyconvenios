<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OrdenCompraDetalle
 * @package App\Models
 * @version August 11, 2021, 5:34 pm CST
 *
 * @property \App\Models\ContratoItem $item
 * @property \App\Models\OrdenesCompra $compra
 * @property integer $compra_id
 * @property integer $item_id
 * @property number $precio
 * @property number $cantidad
 */
class OrdenCompraDetalle extends Model
{
    use SoftDeletes;

    public $table = 'ordenes_compras_detalles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['subtotal'];


    public $fillable = [
        'compra_id',
        'item_id',
        'precio',
        'cantidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'compra_id' => 'integer',
        'item_id' => 'integer',
        'precio' => 'decimal:2',
        'cantidad' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'compra_id' => 'required',
        'item_id' => 'required',
        'precio' => 'required|numeric',
        'cantidad' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function item()
    {
        return $this->belongsTo(\App\Models\ContratoItem::class, 'item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function compra()
    {
        return $this->belongsTo(\App\Models\OrdenesCompra::class, 'compra_id');
    }

    public function getSubTotalAttribute()
    {
        return $this->precio * $this->cantidad;
    }

    public function descuentaSaldoItem()
    {
        $this->item->saldo-=$this->cantidad;
        $this->item->save();
    }


    public function sumaSaldoItem()
    {
        $this->item->saldo+=$this->cantidad;
        $this->item->save();
    }
}
