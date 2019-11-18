<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarGradoAcademicoInstitucionUnicoRule;

class IncorporarGradoAcademicoInstitucionRequest extends FormRequest
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
            'grado_academico_id' => ['required','numeric', new ValidarGradoAcademicoInstitucionUnicoRule(Request()->institucion_id))],
            'institucion_id' => ['required','numeric']
        ];
    }
}
