<?php

namespace App\Rules;

use App\GradoAcademico;
use Illuminate\Contracts\Validation\Rule;

class ValidarNivelUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($nivel_original)
    {
        $this->nivel_original = $nivel_original;
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
        //$value = nivel actual
        if($this->nivel_original != $value){
            $nivel = GradoAcademico::where('nombre','=',$value)->get();            
            if($nivel->count() > 0){
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
