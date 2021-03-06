<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarInstitucionUnicaEditarRule;

class EditarInstitucionRequest extends FormRequest
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
            'nombre' => ['required',new ValidarFormatoNombreRule,new ValidarInstitucionUnicaEditarRule(Request()->institucion_original, Request()->grado_academico_id),'max:255'],
            'grado_academico_id' => ['required','numeric'],
            'institucion_original' => ['required'],
        ];
    }
}
