<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\GradoAcademicoInstitucion;

class ValidarGradoAcademicoInstitucionUnicoRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->institucion_id = $institucion_id;
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
        $grado = GradoAcademicoInstitucion::where([
            ['grado_academico_id','=',$value],
            ['institucion_id','=',$this->institucion_id]
        ]);
        if($grado->count() > 0){
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
