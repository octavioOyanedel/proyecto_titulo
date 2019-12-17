<?php

namespace App\Rules;

use App\Cuenta;
use Illuminate\Contracts\Validation\Rule;

class ValidarCuentaUnicaEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($numero_original)
    {
        $this->numero_original = $numero_original;
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
        //$value = numero actual
        if($this->numero_original != $value){
            $numero = Cuenta::where('numero','=',$value)->get();            
            if($numero->count() > 0){
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
