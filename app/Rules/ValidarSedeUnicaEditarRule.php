<?php

namespace App\Rules;

use App\Sede;
use Illuminate\Contracts\Validation\Rule;

class ValidarSedeUnicaEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($sede_original)
    {
        $this->sede_original = $sede_original;
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
        //$value = sede actual
        if($this->sede_original != $value){
            $sede = Sede::where('nombre','=',$value)->get();            
            if($sede->count() > 0){
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
