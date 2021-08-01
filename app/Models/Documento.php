<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Documento
 * @package App\Models
 * @version July 31, 2021, 10:34 am CST
 *
 * @property string $model_type
 * @property integer $model_id
 * @property string $name
 * @property string $file_name
 * @property string $mime_type
 * @property integer $size
 * @property string $data
 */
class Documento extends Model
{
    use SoftDeletes;

    public $table = 'documentos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'name',
        'file_name',
        'mime_type',
        'size',
        'data'
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
        'name' => 'string',
        'file_name' => 'string',
        'mime_type' => 'string',
        'size' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'model_type' => 'required|string|max:255',
        'model_id' => 'required',
        'name' => 'nullable|string|max:255',
        'file_name' => 'required|string|max:255',
        'mime_type' => 'nullable|string|max:255',
        'size' => 'required',
        'data' => 'nullable|string|max:65535',
    ];


}
