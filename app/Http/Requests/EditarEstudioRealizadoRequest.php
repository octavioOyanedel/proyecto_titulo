<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarEstudioUnicoEditarRule;

class EditarEstudioRealizadoRequest extends FormRequest
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
            'titulo_id' => ['nullable','numeric'],
            'institucion_id' => ['required','numeric'],
            'grado_academico_id' => ['required','numeric',new ValidarEstudioUnicoEditarRule(Request()->institucion_id, Request()->socio_id, Request()->grado_original, Request()->institucion_original)],
            'estado_grado_academico_id' => ['required','numeric'],
            'socio_id' => ['required','numeric'],
            'grado_original' => ['required','numeric'],
            'institucion_original' => ['required','numeric'],

        ];
    }
}
