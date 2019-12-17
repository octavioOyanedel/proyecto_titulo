<?php

namespace App\Rules;

use App\Parentesco;
use Illuminate\Contracts\Validation\Rule;

class ValidarParentescoUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($parentesco_original)
    {
        $this->parentesco_original = $parentesco_original;
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
        //$value = parentesco actual
        if($this->parentesco_original != $value){
            $parentesco = Parentesco::where('nombre','=',$value)->get();            
            if($parentesco->count() > 0){
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
