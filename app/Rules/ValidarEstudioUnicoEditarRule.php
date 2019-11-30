<?php

namespace App\Rules;

use App\EstudioRealizado;
use App\EstudioRealizadoSocio;
use Illuminate\Contracts\Validation\Rule;

class ValidarEstudioUnicoEditarRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($institucion, $socio, $grado_original, $institucion_original)
    {
        $this->institucion = $institucion;
        $this->socio = $socio;
        $this->grado_original = $grado_original;
        $this->institucion_original = $institucion_original;
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
        //$value = grado academico
        if($this->grado_original != $value && $this->institucion_original != $this->institucion){
            $estudios = EstudioRealizadoSocio::orderBy('socio_id', 'ASC')
            ->join('estudios_realizados', 'estudios_realizados_socios.estudio_realizado_id','=','estudios_realizados.id')
            ->where([
                ['estudios_realizados_socios.socio_id','=',$this->socio],
                ['estudios_realizados.grado_academico_id','=',$value],
                ['estudios_realizados.institucion_id','=',$this->institucion]
            ])->get();
            if($estudios->count() > 0){
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
