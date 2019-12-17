<?php

namespace App\Rules;

use App\EstadoSocio;
use Illuminate\Contracts\Validation\Rule;

class ValidarEstadoSocioUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($estado_original)
    {
        $this->estado_original = $estado_original;
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
        //$value = estado actual
        if($this->estado_original != $value){
            $estado = EstadoSocio::where('nombre','=',$value)->get();            
            if($estado->count() > 0){
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
