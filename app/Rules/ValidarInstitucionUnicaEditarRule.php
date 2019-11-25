<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarInstitucionUnicaEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($institucion_original)
    {
        $this->institucion_original = $institucion_original;
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
        //$value = institucion actual
        if($this->institucion_original != $value){
            $institucion = Institucion::where('nombre','=',$value)->get();            
            if($institucion->count() > 0){
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
