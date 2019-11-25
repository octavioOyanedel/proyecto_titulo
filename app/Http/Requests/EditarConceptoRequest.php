<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarConceptoUnicoEditarRule;

class EditarConceptoRequest extends FormRequest
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
            'nombre' => ['required',new ValidarFormatoNombreRule,new ValidarConceptoUnicoEditarRule(Request()->concepto_original),'max:255'],
            'tipo_registro_contable_id' => ['required','numeric'],
            'concepto_original' => ['required'],
        ];
    }
}
