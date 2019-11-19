<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarContrasenasIgualesRule;
use App\rules\ValidarPasswordEditarRule;

class EditarPasswordRequest extends FormRequest
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
            'actual' => ['required','alpha_num',new ValidarPasswordEditarRule(Request()->user_id),'min:8','max:15'],
            'password' => ['required','alpha_num',new ValidarContrasenasIgualesRule(Request()->password_confirm),'min:8','max:15'],
            'password_confirm' => ['required','alpha_num',new ValidarContrasenasIgualesRule(Request()->password),'min:8','max:15'],     
            'user_id' => ['required','numeric']   
        ];
    }
}
