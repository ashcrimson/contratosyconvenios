<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Moneda
 * @package App\Models
 * @version July 20, 2021, 8:47 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $contratos
 * @property string $nombre
 * @property string $codigo
 * @property string $simbolo
 * @property number $equivalencia
 */
class Moneda extends Model
{
    use SoftDeletes;

    public $table = 'monedas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'codigo',
        'simbolo',
        'equivalencia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'codigo' => 'string',
        'equivalencia' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45',
        'codigo' => 'required|string|max:45',
        'equivalencia' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class, 'moneda_id');
    }

    public function getValorDia()
    {
        $dailyIndicators = getDailyIndicators();


//        if (!is_array($dailyIndicators) && is_string($dailyIndicators))
//            return $dailyIndicators;

        try{

            switch ($this->codigo){

                case "UF":
                    $valor = $dailyIndicators['uf']['valor'];
                    break;
                case "USD":
                    $valor = $dailyIndicators['dolar']['valor'];
                    break;
                case "USDI":
                    $valor = $dailyIndicators['dolar_intercambio']['valor'];
                    break;
                case "EURO":
                    $valor = $dailyIndicators['euro']['valor'];
                    break;
                case "IPC":
                    $valor = $dailyIndicators['ipc']['valor'];
                    break;
                case "UTM":
                    $valor = $dailyIndicators['utm']['valor'];
                    break;
                case "IVP":
                    $valor = $dailyIndicators['ivp']['valor'];
                    break;
                case "IMACEC":
                    $valor = $dailyIndicators['imacec']['valor'];
                    break;
                default :
                    $valor = 1;
            }


        }catch (\Exception $exception){
            return  null;
        }



        return $valor;
    }

    public function getEsValorDiaAttribute()
    {
        return $this->getValorDia() ? 'Sí' : 'No';
    }

    public function getUltimaActualizacionFecha()
    {
        $dailyIndicators = getDailyIndicators();

        if (!is_array($dailyIndicators) && is_string($dailyIndicators)){
            $fecha = $this->updated_at;

        }else{
            $fecha = Carbon::parse($dailyIndicators['fecha']);

        }



        return $fecha->format('d/m/Y H:m:i A');
    }

    public function getEquivalenciaAttribute($val)
    {
        return $this->attributes['equivalencia'] = $this->getValorDia() ?? $val;
    }
}
