<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarNumeroRegistroUnicoRule;

class AnularChequeRequest extends FormRequest
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
            'cuenta_id' => ['required','numeric'],
            'tipo_registro_contable_id' => ['nullable','numeric'],
            'numero_registro' => ['nullable','numeric',new ValidarNumeroRegistroUnicoRule(Request()->tipo_registro_contable_id)],
            'cheque' => ['nullable','numeric','unique:registros_contables,cheque'],
            'detalle' => ['nullable'],
        ];
    }
}
