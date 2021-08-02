<?php

namespace App\Models;

use App\Traits\HasDocumento;
use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Bitacora
 * @package App\Models
 * @version August 1, 2021, 11:23 pm CST
 *
 * @property \App\Models\User $userCrea
 * @property \App\Models\User $userActualiza
 * @property string $model_type
 * @property integer $model_id
 * @property string $seccion
 * @property string $titulo
 * @property string $descripcion
 * @property integer $user_crea
 * @property integer $user_actualiza
 */
class Bitacora extends Model
{
    use SoftDeletes,HasDocumento;

    public $table = 'bitacoras';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'seccion',
        'titulo',
        'descripcion',
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
        'model_type' => 'string',
        'model_id' => 'integer',
        'seccion' => 'string',
        'titulo' => 'string',
        'descripcion' => 'string',
        'user_crea' => 'integer',
        'user_actualiza' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'model_type' => 'required|string|max:255',
        'model_id' => 'required',
        'seccion' => 'nullable|string|max:255',
        'titulo' => 'nullable|string|max:255',
        'descripcion' => 'required|string',
        'user_crea' => 'required',
        'user_actualiza' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

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
}
