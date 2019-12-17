<?php

namespace App\Rules;

use App\Banco;
use Illuminate\Contracts\Validation\Rule;

class ValidarBancoUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($banco_original)
    {
        $this->banco_original = $banco_original;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //$value = banco actual
        if($this->banco_original != $value){
            $banco = Banco::where('nombre','=',$value)->get();            
            if($banco->count() > 0){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El valor de este campo ya ha sido registrado.';
    }
}
