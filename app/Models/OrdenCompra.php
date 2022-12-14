<?php

namespace App\Models;

use App\Traits\HasBitacora;
use App\Traits\HasDocumento;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class OrdenCompra
 * @package App\Models
 * @version July 28, 2021, 12:00 pm CST
 *
 * @property \App\Models\Contrato $contrato
 * @property \App\Models\OrdenesComprasEstado $estado
 * @property \App\Models\User $userCrea
 * @property \App\Models\User $userActualiza
 * @property \Illuminate\Database\Eloquent\Collection $detalles
 * @property integer $contrato_id
 * @property string $numero
 * @property Carbon $fecha_envio
 * @property string $total
 * @property string $codigo
 * @property string $cantidad
 * @property string $descripcion
 * @property boolean $tiene_detalles
 * @property integer $estado_id
 * @property integer $user_crea
 * @property integer $user_actualiza
 */
class OrdenCompra extends Model
{
    use SoftDeletes,HasDocumento,HasBitacora;

    public $table = 'ordenes_compras';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contrato_id',
        'numero',
        'fecha_envio',
        'total',
        'codigo',
        'cantidad',
        'descripcion',
        'tiene_detalles',
        'estado_id',
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
        'contrato_id' => 'integer',
        'numero' => 'string',
        'fecha_envio' => 'date',
        'total' => 'string',
        'codigo' => 'string',
        'cantidad' => 'string',
        'descripcion' => 'string',
        'tiene_detalles' => 'boolean',
        'estado_id' => 'integer',
        'user_crea' => 'integer',
        'user_actualiza' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contrato_id' => 'required',
        'numero' => 'required|string|max:255',
        'fecha_envio' => 'required|date|max:255',
        'total' => 'nullable|string|max:255',
        'descripcion' => 'nullable|string|max:255',
        'tiene_detalles' => 'nullable|boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contrato()
    {
        return $this->belongsTo(\App\Models\Contrato::class, 'contrato_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estado()
    {
        return $this->belongsTo(\App\Models\OrdenCompraEstado::class, 'estado_id');
    }

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
    public function detalles()
    {
        return $this->hasMany(\App\Models\OrdenCompraDetalle::class, 'compra_id');
    }

    public function puedeAnular()
    {
        return $this->estado_id!=OrdenCompraEstado::ANULADA;
    }


    public function egreso()
    {
        if ($this->detalles->count()>0){

            /**
             * @var $detalle OrdenCompraDetalle
             */
            foreach ($this->detalles as $detalle){

                $detalle->descuentaSaldoItem();

            }
        }
    }


    public function anular()
    {
        $this->estado_id=OrdenCompraEstado::ANULADA;

        if ($this->detalles->count()>0){

            /**
             * @var $detalle OrdenCompraDetalle
             */
            foreach ($this->detalles as $detalle){

                $detalle->sumaSaldoItem();
            }
        }

        $this->save();
    }
}
