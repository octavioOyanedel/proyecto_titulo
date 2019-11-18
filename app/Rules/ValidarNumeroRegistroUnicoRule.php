<?php

namespace App\Rules;

use App\RegistroContable;
use Illuminate\Contracts\Validation\Rule;

class ValidarNumeroRegistroUnicoRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tipo_id)
    {
        $this->tipo_id = $tipo_id;
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
        $registro = RegistroContable::where([
            ['numero_registro','=',$value],
            ['tipo_registro_contable_id','=',$this->tipo_id]
        ]);
        if($registro->count() > 0){
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
