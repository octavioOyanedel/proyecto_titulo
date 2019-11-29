<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarRutRule;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarRutCargaUnicoEditarRule;

class EditarCargaRequest extends FormRequest
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
            'rut' => ['required',new ValidarRutRule,new ValidarRutCargaUnicoEditarRule(Request()->rut_original),'max:9'],
            'nombre1' => ['required',new ValidarFormatoNombreRule,'max:255'],
            'nombre2' => ['nullable',new ValidarFormatoNombreRule,'max:255'],
            'apellido1' => ['required',new ValidarFormatoNombreRule,'max:255'],
            'apellido2' => ['nullable',new ValidarFormatoNombreRule,'max:255'],
            'fecha_nac' => ['nullable','date'],
            'socio_id' => ['required','numeric'],
            'parentesco_id' => ['required','numeric'],
        ];
    }
}
