<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarNumeroCuentaRule;

class IncorporarCuentaRequest extends FormRequest
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
            'numero' => ['required',new ValidarNumeroCuentaRule,'unique:cuentas,numero'],
            'tipo_cuenta_id' => ['required','numeric'],
            'banco_id' => ['required','numeric'],
        ];
    }
}
