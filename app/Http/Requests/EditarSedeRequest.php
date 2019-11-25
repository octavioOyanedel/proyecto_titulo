<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarSedeUnicaEditarRule;

class EditarSedeRequest extends FormRequest
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
            'nombre' => ['required',new ValidarFormatoNombreRule,new ValidarSedeUnicaEditarRule(Request()->sede_original),'max:255'],
            'sede_original' => ['required'],
        ];
    }
}
