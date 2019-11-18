<?php

namespace App\Rules;

use App\Area;
use Illuminate\Contracts\Validation\Rule;

class ValidarAreaUnicaRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($sede_id)
    {
        $this->sede_id = $sede_id;
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
        $sede = Area::where([
            ['nombre','=',$value],
            ['sede_id','=',$this->sede_id]
        ]);
        if($sede->count() > 0){
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
