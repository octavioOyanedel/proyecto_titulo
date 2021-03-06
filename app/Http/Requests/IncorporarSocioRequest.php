<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarRutRule;
use App\Rules\ValidarFormatoNombreRule;
use App\Rules\ValidarDireccionRule;

class IncorporarSocioRequest extends FormRequest
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
            'rut' => ['required',new ValidarRutRule,'unique:socios,rut','max:9'],        
            'nombre1' => ['required',new ValidarFormatoNombreRule,'max:255'],
            'nombre2' => ['nullable',new ValidarFormatoNombreRule,'max:255'],
            'apellido1' => ['required',new ValidarFormatoNombreRule,'max:255'],
            'apellido2' => ['nullable',new ValidarFormatoNombreRule,'max:255'],
            'genero' => ['required'],
            'fecha_nac' => ['nullable','date'],
            'celular' => ['nullable','numeric'],
            'correo' => ['nullable','email','unique:socios,correo'],
            'direccion' => ['nullable',new ValidarDireccionRule,'max:255'],
            'fecha_pucv' => ['nullable','date'],
            'anexo' => ['nullable','numeric'],
            'numero_socio' => ['required','numeric','unique:socios,numero_socio'],
            'fecha_sind1' => ['nullable','date'],
            'comuna_id' => ['nullable','numeric'],
            'ciudad_id' => ['nullable'],
            'sede_id' => ['required','numeric'],
            'area_id' => ['nullable','numeric'],
            'cargo_id' => ['required','numeric'],
            //'estado_socio_id' => ['required','numeric'],
            'nacionalidad_id' => ['required','numeric'],
        ];
    }
}
