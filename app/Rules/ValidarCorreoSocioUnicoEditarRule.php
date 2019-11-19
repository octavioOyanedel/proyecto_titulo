<?php

namespace App\Rules;

use App\Socio;
use Illuminate\Contracts\Validation\Rule;

class ValidarCorreoSocioUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($correo_original)
    {
        $this->correo_original = $correo_original;
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
        //$value = correo actual
        if($this->correo_original != $value){
            $correo = Socio::where('correo','=',$value)->get();            
            if($correo->count() > 0){
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
