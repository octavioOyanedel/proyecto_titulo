<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarCargoUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($cargo_original)
    {
        $this->cargo_original = $cargo_original;
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
        //$value = cargo actual
        if($this->cargo_original != $value){
            $cargo = Cargo::where('nombre','=',$value)->get();            
            if($cargo->count() > 0){
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
