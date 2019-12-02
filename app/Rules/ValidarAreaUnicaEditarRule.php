<?php

namespace App\Rules;

use App\Area;
use Illuminate\Contracts\Validation\Rule;

class ValidarAreaUnicaEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($area_original)
    {
        $this->area_original = $area_original;
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
        //$value = area actual
        if($this->area_original != $value){
            $area = Area::where('nombre','=',$value)->get();            
            if($area->count() > 0){
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
