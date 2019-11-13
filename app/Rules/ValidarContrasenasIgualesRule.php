<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarContrasenasIgualesRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($parametro)
    {
        $this->parametro = $parametro;
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
        $parametro = $this->parametro;
        $campo_pass = $value;
        if(strcmp($parametro, $campo_pass) === 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Contraseñas distintas.';
    }
}
