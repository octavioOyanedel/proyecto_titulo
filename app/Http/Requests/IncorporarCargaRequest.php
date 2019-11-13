<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarRutRule;
use App\Rules\ValidarFormatoNombre;

class IncorporarCargaRequest extends FormRequest
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
            'rut' => ['required',new ValidarRutRule,'unique:cargas_familiares,rut','max:9'],
            'nombre1' => ['required',new ValidarFormatoNombre,'max:255'],
            'nombre2' => ['nullable',new ValidarFormatoNombre,'max:255'],
            'apellido1' => ['required',new ValidarFormatoNombre,'max:255'],
            'apellido2' => ['nullable',new ValidarFormatoNombre,'max:255'],
            'fecha_nac' => ['nullable','date'],
            'socio_id' => ['required','numeric'],
            'parentesco_id' => ['required','numeric'],
        ];
    }
}