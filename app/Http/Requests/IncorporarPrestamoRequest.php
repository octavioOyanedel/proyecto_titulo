<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncorporarPrestamoRequest extends FormRequest
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
            'fecha_solicitud' => ['required','date'],
            'numero_egreso' => ['required','numeric','unique:prestamos,numero_egreso'],
            'monto' => ['required','numeric'],
            'cheque' => ['nullable','numeric','unique:prestamos,cheque'],
            'deposito' => ['required','boolean'],
            'fecha_pago_deposito' => ['nullable','date'],
            'numero_cuotas' => ['required','numeric'],
            'socio_id' => ['required','numeric'],
            'forma_pago_id' => ['required','numeric'],
        ];
    }
}
