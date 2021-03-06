<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarTituloUnicoEditarRule;

class EditarTituloRequest extends FormRequest
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
            'nombre' => ['required',new ValidarFormatoNombreRule,new ValidarTituloUnicoEditarRule(Request()->titulo_original, Request()->grado_academico_id),'max:255'],
            'grado_academico_id' => ['required','numeric'],            
            'titulo_original' => ['required'],
        ];
    }
}
