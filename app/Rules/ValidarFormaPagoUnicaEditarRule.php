<?php

namespace App\Rules;

use App\FormaPago;
use Illuminate\Contracts\Validation\Rule;

class ValidarFormaPagoUnicaEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pago_original)
    {
        $this->pago_original = $pago_original;
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
        //$value = pago actual
        if($this->pago_original != $value){
            $pago = FormaPago::where('nombre','=',$value)->get();            
            if($pago->count() > 0){
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
