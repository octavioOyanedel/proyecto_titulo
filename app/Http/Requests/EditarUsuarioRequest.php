<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarCorreoUsuarioUnicoEditarRule;

class EditarUsuarioRequest extends FormRequest
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
            'nombre1' => ['required',new ValidarFormatoNombreRule,'max:255'],
            'nombre2' => ['nullable',new ValidarFormatoNombreRule,'max:255'],
            'apellido1' => ['required',new ValidarFormatoNombreRule,'max:255'],
            'apellido2' => ['nullable',new ValidarFormatoNombreRule,'max:255'],
            'email' => ['required','email',new ValidarCorreoUsuarioUnicoEditarRule(Request()->email_original)],
            'rol_id' => ['required','numeric'],
            'email_original' => ['nullable']
        ];
    }
}
