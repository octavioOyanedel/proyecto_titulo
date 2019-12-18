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
        $registro = null;

        if($this->tipo_id === '1'){
            $registro = RegistroContable::where([
                ['numero_registro','=',$value],
                ['tipo_registro_contable_id','=',$this->tipo_id],
                ['concepto_id','=',1],
            ])->first();
        }else{
            $registro = RegistroContable::where([
                ['numero_registro','=',$value],
                ['tipo_registro_contable_id','=',$this->tipo_id],
                ['concepto_id','=',2],
            ])->first();
        }

        if($registro){
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
        return 'Este registro contable ya está anulado.';
    }
}
