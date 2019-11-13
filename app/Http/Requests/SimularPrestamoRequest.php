<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimularPrestamoRequest extends FormRequest
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
            'rut' => ['required'],
            'fecha_solicitud' => ['required','date'],
            'numero_egreso' => ['required','numeric','unique:registros_contables,numero_registro'],
            'cuenta_id' => ['required','numeric'],
            'forma_pago_id' => ['required','numeric'],
            'cheque' => ['nullable','numeric','unique:registros_contables,cheque'],
            'fecha_pago_deposito' => ['nullable','date'],
            'monto' => ['required','numeric'],
            'numero_cuotas' => ['nullable','numeric'],
            'socio_id' => ['required','numeric'],
        ];
    }
}
