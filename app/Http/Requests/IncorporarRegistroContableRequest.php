<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncorporarRegistroContableRequest extends FormRequest
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
            'fecha' => ['required','date'],
            'numero_registro' => ['required','numeric','unique:registros_contables,numero_registro'],
            'cheque' => ['nullable','numeric','unique:registros_contables,cheque'],
            'monto' => ['required','numeric'],
            'concepto_id' => ['required','numeric'],
            'detalle' => ['nullable','max:255'],
            'tipo_registro_contable_id' => ['required','numeric'],
            'cuenta_id' => ['required','numeric'],
            'asociado_id' => ['nullable','numeric'],
            'usuario_id' => ['required','numeric'],
            'socio_id' => ['nullable','numeric'],
        ];
    }
}
