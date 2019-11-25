<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarAsociadoUnicoEditarRule;

class EditarAsociadoRequest extends FormRequest
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
            'concepto' => ['required',new ValidarFormatoNombreRule,new ValidarAsociadoUnicoEditarRule(Request()->concepto_original),'max:255'],
            'nombre' => ['nullable',new ValidarFormatoNombreRule,'max:255'],
            'concepto_original' => ['required'],
        ];
    }
}
