<?php

namespace App;

use App\Socio;
use App\Parentesco;
use Illuminate\Database\Eloquent\Model;

class CargaFamiliar extends Model
{
    // cambia nombre de tabla
    protected $table = 'cargas_familiares';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'rut','nombre1','nombre2','apellido1','apellido2','fecha_nac','socio_id','parentesco_id',
    ];

    /**
     * Modificador de parentescos
     */
    public function getParentescoIdAttribute($value)
    {
        if($value != null){
            $parentesco_id = $value;
            $parentesco = Parentesco::findOrFail($parentesco_id);
            $value = $parentesco->nombre;
            return $value;
        }else{
            return '';
        }         
    }

    /**
     * Relación 
     */
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }

    /**
     * Relación 
     */
    public function parentesco()
    {
        return $this->hasOne('App\Parentesco');
    }   

    /**
     * Modificador de fecha de nacimiento
     */
    public function getFechaNacAttribute($valor)
    {
        if($valor != null){
            return formatoFecha($valor);
        }else{
            return '';
        }          
    }   

    /**
     * Modificador de rut
     */
    public function getRutAttribute($valor)
    {
        if($valor != null){
            return formatoRut($valor);
        }else{
            return '';
        }          
    }
    
    /**
     * mutator nombre 
     */
    public function setNombre1Attribute($value)
    {
        $this->attributes['nombre1'] = formatoNombres($value);
    }

    /**
     * mutator nombre 
     */
    public function setNombre2Attribute($value)
    {
        $this->attributes['nombre2'] = formatoNombres($value);
    }

    /**
     * mutator nombre 
     */
    public function setApellido1Attribute($value)
    {
        $this->attributes['apellido1'] = formatoNombres($value);
    }

    /**
     * mutator nombre 
     */
    public function setApellido2Attribute($value)
    {
        $this->attributes['apellido2'] = formatoNombres($value);
    }

    /**
     * Formato editar cargo 
     */
    static public function formatoEditarCargo($request, $carga)
    {
        $request['rut'] = formatoRut($request->rut);
        $request['parentesco_id'] = Parentesco::findOrFail($request->parentesco_id)->nombre;
        $formato_request = array_slice($request->toArray(),2,8);
        $formato_carga = array_slice($carga->toArray(),1,8);

        return convertirArrayAString($formato_carga).' >>> a >>> '.convertirArrayAString($formato_request);
    }
}
