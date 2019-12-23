<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarNumeroRegistroUnicoEditarRule;
use App\Rules\ValidarChequeRegistroContableUnicoEditarRule;

class EditarRegistroContableRequest extends FormRequest
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
            'numero_registro' => ['required','numeric',new ValidarNumeroRegistroUnicoEditarRule(Request()->numero_registro_original, Request()->tipo_registro_contable_original, Request()->tipo_registro_contable_id)],
            'cheque' => ['nullable','numeric',new ValidarChequeRegistroContableUnicoEditarRule(Request()->cheque_original, Request()->tipo_registro_contable_original, Request()->tipo_registro_contable_id)],
            'monto' => ['required','numeric'],
            'concepto_id' => ['required','numeric'],
            'detalle' => ['nullable','max:255'],
            'tipo_registro_contable_id' => ['required','numeric'],
            'cuenta_id' => ['required','numeric'],
            'asociado_id' => ['nullable','numeric'],
            'usuario_id' => ['required','numeric'],
            'socio_id' => ['nullable','numeric'],
            'numero_registro_original' => ['required'],
            'tipo_registro_contable_original' => ['required'],
            'cheque_original' => ['nullable'],
        ];
    }
}
