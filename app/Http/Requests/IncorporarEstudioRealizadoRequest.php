<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncorporarEstudioRealizadoRequest extends FormRequest
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
            'grado_academico_id' => ['required','numeric'],
            'estado_grado_academico_id' => ['required','numeric'],
        ];
    }
}
