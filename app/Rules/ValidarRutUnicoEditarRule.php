<?php

namespace App\Rules;

use App\Socio;
use Illuminate\Contracts\Validation\Rule;

class ValidarRutUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($rut_original)
    {
        $this->rut_original = $rut_original;
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
        //$value = rut actual
        if($this->rut_original != $value){
            $rut = Socio::where('rut','=',$value)->get();            
            if($rut->count() > 0){
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
