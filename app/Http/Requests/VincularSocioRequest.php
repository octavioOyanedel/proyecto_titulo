<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarRutRule;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarRutUnicoEditarRule;
use App\Rules\ValidarNumeroSocioUnicoEditarRule;
use App\Rules\ValidarCorreoSocioUnicoEditarRule;
use App\Rules\ValidarDireccionRule;

class VincularSocioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rut' => ['required',new ValidarRutRule,'max:9'],
            'nombre1' => ['required',new ValidarFormatoNombreRule,new ValidarNumeroSocioUnicoEditarRule(Request()->numero_socio_original),'max:255'],
            'nombre2' => ['nullable',new ValidarFormatoNombreRule,new ValidarCorreoSocioUnicoEditarRule(Request()->correo_original),'max:255'],
            'apellido1' => ['required',new ValidarFormatoNombreRule,'max:255'],
            'apellido2' => ['nullable',new ValidarFormatoNombreRule,'max:255'],
            'genero' => ['required'],
            'fecha_nac' => ['nullable','date'],
            'celular' => ['nullable','numeric'],
            'correo' => ['nullable','email'],
            'direccion' => ['nullable',new ValidarDireccionRule,'max:255'],
            'fecha_pucv' => ['nullable','date'],
            'anexo' => ['nullable','numeric'],
            'numero_socio' => ['required','numeric'],
            'fecha_sind1' => ['nullable','date'],
            'comuna_id' => ['nullable','numeric'],
            'ciudad_id' => ['nullable'],
            'sede_id' => ['required','numeric'],
            'area_id' => ['nullable','numeric'],
            'cargo_id' => ['required','numeric'],
            //'estado_socio_id' => ['required','numeric'],
            'nacionalidad_id' => ['required','numeric'],
            'rut_original' => ['required'],
            'numero_socio_original' => ['required'],
            'correo_original' => ['nullable'],
            'socio_id' => ['required','numeric'],
        ];
    }
}
