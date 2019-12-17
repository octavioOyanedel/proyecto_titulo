<?php

namespace App\Rules;

use App\RegistroContable;
use Illuminate\Contracts\Validation\Rule;

class ValidarNumeroRegistroUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($numero_original, $tipo_original, $tipo_nuevo)
    {
        $this->numero_original = $numero_original;
        $this->tipo_original = $tipo_original;
        $this->tipo_nuevo = $tipo_nuevo;
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
        //$value = numero nuevo
        if($this->numero_original != $value &&  $this->tipo_original != $this->tipo_nuevo){
            $registro = RegistroContable::where([
                ['numero_registro','=',$value],
                ['tipo_registro_contable_id','=',$this->tipo_id]
            ]);
            if($registro->count() > 0){
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
