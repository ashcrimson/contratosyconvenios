<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Area
 * @package App\Models
 * @version July 16, 2021, 7:05 pm CST
 *
 * @property string $AREA
 * @property integer $ID_CARGO
 */
class Area extends Model
{
//    use SoftDeletes;

    public $table = 'AREAS';

    protected $primaryKey = 'ID_AREA';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'area',
        'id_cargo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_area' => 'string',
        'area' => 'string',
        'id_cargo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'area' => 'nullable|string|max:200',
        'id_cargo' => 'nullable|integer'
    ];


}
