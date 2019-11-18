<?php

namespace App\Rules;

use App\Concepto;
use Illuminate\Contracts\Validation\Rule;

class ValidarConceptoUnicoRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tipo_registro)
    {
        $this->tipo_registro = $tipo_registro;
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
        $concepto = Concepto::where([
            ['nombre','=',$value],
            ['tipo_registro_id','=',$this->tipo_registro]
        ]);
        if($concepto->count() > 0){
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
