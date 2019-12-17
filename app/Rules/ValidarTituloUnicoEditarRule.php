<?php

namespace App\Rules;

use App\Titulo;
use Illuminate\Contracts\Validation\Rule;

class ValidarTituloUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($titulo_original, $grado_academico_id)
    {
        $this->titulo_original = $titulo_original;
        $this->grado_academico_id = $grado_academico_id;
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
            $titulo = Titulo::where([
                ['nombre','=', $value],
                ['grado_academico_id','=', $this->grado_academico_id]
            ])->get();          
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
