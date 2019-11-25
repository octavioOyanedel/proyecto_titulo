<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarNacionalidadUnicaEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($nacionalidad_original)
    {
        $this->nacionalidad_original = $nacionalidad_original;
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
        //$value = nacionalidad actual
        if($this->nacionalidad_original != $value){
            $nacionalidad = Nacionalidad::where('nombre','=',$value)->get();            
            if($nacionalidad->count() > 0){
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
