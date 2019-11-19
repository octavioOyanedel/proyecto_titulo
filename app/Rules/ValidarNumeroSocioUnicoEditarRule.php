<?php

namespace App\Rules;

use App\Socio;
use Illuminate\Contracts\Validation\Rule;

class ValidarNumeroSocioUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($numero_socio_original)
    {
        $this->numero_socio_original = $numero_socio_original;
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
        //$value = numero de socio actual
        if($this->numero_socio_original != $value){
            $numero = Socio::where('numero_socio','=',$value)->get();            
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
