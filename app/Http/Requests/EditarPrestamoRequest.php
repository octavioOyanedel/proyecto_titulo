<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarNumeroRegistroUnicoEditarRule;
use App\Rules\ValidarChequeRegistroContableUnicoEditarRule;

class EditarPrestamoRequest extends FormRequest
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
            'numero_egreso' => ['required','numeric',new ValidarNumeroRegistroUnicoEditarRule(Request()->numero_registro_original, 1, 1)],
            'cheque' => ['nullable','numeric',new ValidarChequeRegistroContableUnicoEditarRule(Request()->cheque_original, 1, 1)],
            'cuenta_id' => ['required','numeric'],
            'numero_registro_original' => ['required','numeric'],
            'prestamo_id' => ['required','numeric'],
            'cheque_original' => ['required','numeric'],
        ];
    }
}
