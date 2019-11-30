<?php

namespace App\Rules;

use App\Titulo;
use Illuminate\Contracts\Validation\Rule;

class ValidarTituloUnicoRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($grado_academico_id)
    {
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
        $titulo = Titulo::where([
            ['nombre','=', $value],
            ['grado_academico_id','=', $this->grado_academico_id]
        ]);
        if($titulo->count() > 0){
            return false;
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
