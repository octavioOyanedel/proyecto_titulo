<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarEgresoUnicoRule;
use App\Rules\ValidarChequeEgresoUnicoRule;

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
            'numero_egreso' => ['required','numeric',new ValidarEgresoUnicoRule],
            'cuenta_id' => ['required','numeric'],
            'cheque' => ['nullable','numeric',new ValidarChequeEgresoUnicoRule],
            'fecha_pago_deposito' => ['nullable','date'],
            'monto' => ['required','numeric'],
            'numero_cuotas' => ['nullable','numeric'],
            'socio_id' => ['required','numeric'],
            'estado_deuda_id' => ['required','numeric'],
            'interes_id' => ['nullable','numeric'],
            'forma_pago_id' => ['required','numeric'],
        ];
    }
}
