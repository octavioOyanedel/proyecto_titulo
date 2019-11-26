<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarRutRule;

class FiltrarPrestamoRequest extends FormRequest
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
          'fecha_pago_ini' => ['nullable','date'],
          'fecha_pago_fin' => ['nullable','date'],
          'monto_ini' => ['nullable','numeric'],
          'monto_fin' => ['nullable','numeric'],
          'numero_cuotas' => ['nullable','numeric'],
          'forma_pago_id' => ['nullable','numeric'],
          'rut' => ['nullable',new ValidarRutRule,'max:9'],
          'cuenta_id' => ['nullable','numeric'],
          'estado_deuda_id' => ['nullable','numeric'],
        ];
    }
}
