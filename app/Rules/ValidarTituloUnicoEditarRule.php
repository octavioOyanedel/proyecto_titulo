<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarTituloUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($titulo_original)
    {
        $this->titulo_original = $titulo_original;
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
        //$value = titulo actual
        if($this->titulo_original != $value){
            $titulo = Titulo::where('nombre','=',$value)->get();            
            if($titulo->count() > 0){
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
