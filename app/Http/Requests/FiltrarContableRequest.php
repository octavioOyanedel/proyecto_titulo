<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltrarContableRequest extends FormRequest
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
          'fecha_solicitud_ini' => ['nullable','date'],
          'fecha_solicitud_fin' => ['nullable','date'],
          'monto_ini' => ['nullable','numeric'],
          'monto_fin' => ['nullable','numeric'],
          'tipo_registro_contable_id' => ['nullable','numeric'],
          'cuenta_id' => ['nullable','numeric'],
          'concepto_id' => ['nullable'],
          'socio_id' => ['nullable','numeric'],
          'asociado_id' => ['nullable','numeric'],
          'detalle' => ['nullable'],          
        ];
    }
}
