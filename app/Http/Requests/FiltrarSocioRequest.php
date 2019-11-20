<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarDireccionRule;

class FiltrarSocioRequest extends FormRequest
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
        return [
            'fecha_nac_ini' => ['nullable','date'],
            'fecha_nac_fin' => ['nullable','date'],
            'fecha_pucv_ini' => ['nullable','date'],
            'fecha_pucv_fin' => ['nullable','date'],
            'fecha_sind1_ini' => ['nullable','date'],
            'fecha_sind1_fin' => ['nullable','date'],
            'genero' => ['nullable'],
            'comuna_id' => ['nullable','numeric'],
            'ciudad_id' => ['nullable'],
            'direccion' => ['nullable',new ValidarDireccionRule,'max:255'],
            'sede_id' => ['nullable','numeric'],
            'area_id' => ['nullable'],
            'cargo_id' => ['nullable','numeric'],
            'estado_socio_id' => ['nullable','numeric'],
            'nacionalidad_id' => ['nullable','numeric'],
        ];
    }
}
