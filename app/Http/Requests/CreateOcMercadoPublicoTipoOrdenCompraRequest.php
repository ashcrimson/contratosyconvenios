<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\OcMercadoPublicoTipoOrdenCompra;

class CreateOcMercadoPublicoTipoOrdenCompraRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return OcMercadoPublicoTipoOrdenCompra::$rules;
    }
}
