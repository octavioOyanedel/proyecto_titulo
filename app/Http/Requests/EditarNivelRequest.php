<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarNivelUnicoEditarRule;

class EditarNivelRequest extends FormRequest
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
            'nombre' => ['required',new ValidarFormatoNombreRule,new ValidarNivelUnicoEditarRule(Request()->nivel_original),'max:255'],
            'nivel_original' => ['required'],
        ];
    }
}
