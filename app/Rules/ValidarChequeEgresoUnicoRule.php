<?php

namespace App\Rules;

use App\RegistroContable;
use Illuminate\Contracts\Validation\Rule;

class ValidarChequeEgresoUnicoRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ['tipo_registro_contable_id','=' 1],
            ['cheque','=',$value]
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
        return 'The validation error message.';
    }
}
