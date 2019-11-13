<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarContrasenasIgualesRule;

class IncorporarUsuarioRequest extends FormRequest
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
            'nombre1' => ['required','alpha','max:255'],
            'nombre2' => ['nullable','alpha','max:255'],
            'apellido1' => ['required','alpha','max:255'],
            'apellido2' => ['nullable','alpha','max:255'],
            'email' => ['required','email'],
            'password' => ['required','alpha_num',new ValidarContrasenasIgualesRule(Request()->password_confirm),'min:8','max:15'],
            'password_confirm' => ['required','alpha_num',new ValidarContrasenasIgualesRule(Request()->password),'min:8','max:15'],
            'rol_id' => ['required','numeric']
        ];
    }
}
