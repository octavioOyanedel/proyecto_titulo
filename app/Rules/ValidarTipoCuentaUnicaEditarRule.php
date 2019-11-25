<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarTipoCuentaUnicaEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tipo_original)
    {
        $this->tipo_original = $tipo_original;
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
        //$value = tipo actual
        if($this->tipo_original != $value){
            $tipo = TipoCuenta::where('nombre','=',$value)->get();            
            if($tipo->count() > 0){
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
