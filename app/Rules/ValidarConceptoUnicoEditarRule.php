<?php

namespace App\Rules;

use App\Concepto;
use Illuminate\Contracts\Validation\Rule;

class ValidarConceptoUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($concepto_original)
    {
        $this->concepto_original = $concepto_original;
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
        //$value = concepto actual
        if($this->concepto_original != $value){
            $concepto = Concepto::where('nombre','=',$value)->get();
            if($concepto->count() > 0){
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
