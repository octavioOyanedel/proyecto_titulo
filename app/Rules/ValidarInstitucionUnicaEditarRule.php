<?php

namespace App\Rules;

use App\Institucion;
use Illuminate\Contracts\Validation\Rule;

class ValidarInstitucionUnicaEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($institucion_original, $grado_academico_id)
    {
        $this->institucion_original = $institucion_original;
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
        //$value = institucion actual
        if($this->institucion_original != $value){
            $institucion = Institucion::where([
                ['nombre','=', $value],
                ['grado_academico_id','=', $this->grado_academico_id]
            ])->get();          
            if($institucion->count() > 0){
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
