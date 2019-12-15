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
     * scope busqueda por nombre 1
     */
    public function scopeNombre1($query, $nombre1)
    {
        if ($nombre1) {
            return $query->orWhere('nombre1', 'LIKE', "%$nombre1%");
        }
    }

    /**
     * scope busqueda por nombre 2
     */
    public function scopeNombre2($query, $nombre2)
    {
        if ($nombre2) {
            return $query->orWhere('nombre2', 'LIKE', "%$nombre2%");
        }
    }
    /**
     * scope busqueda por apellido 1
     */
    public function scopeApellido1($query, $apellido1)
    {
        if ($apellido1) {
            return $query->orWhere('apellido1', 'LIKE', "%$apellido1%");
        }
    }

    /**
     * scope busqueda por apellido 2
     */
    public function scopeApellido2($query, $apellido2)
    {
        if ($apellido2) {
            return $query->orWhere('apellido2', 'LIKE', "%$apellido2%");
        }
    }

    /**
     * scope busqueda por parentesco
     */
    public function scopeParentescoId($query, $parentesco)
    {
        if ($parentesco) {
            $parentesco_id = Parentesco::obtenerParentescoPorNombre($parentesco);
            if($parentesco_id != null){
                return $query->orWhere('parentesco_id', '=', $parentesco_id->id);
            }
        }
    }

    /**
     * scope busqueda por parentesco
     */
    public function scopeSocioId($query, $rut)
    {
        if ($rut) {
            $socio_id = Socio::obtenerSocioPorRut($rut);
            if($socio_id != null){
                return $query->orWhere('socio_id', '=', $socio_id->id);
            }
        }
    }

    /**
     * scope busqueda por rut
     */
    public function scopeRut($query, $rut)
    {
        if ($rut) {
            return $query->orWhere('rut', '=', $rut);
        }
    }

    /**
     * scope busqueda fecha
     */
    public function scopeFechaNacimientoUnica($query, $fecha)
    {
        $fecha_formarteada = date("Y-m-d", strtotime($fecha));
        if($fecha != null){
            return $query->orWhere('fecha_nac','=',$fecha_formarteada);
        }
    }

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

    /**
     * contar hijos
     */
    public function contarHijos()
    {
        return CargaFamiliar::orWhere('parentesco_id','=',1)
        ->orWhere('parentesco_id','=',2)
        ->count();
    }

    /**
     * contar hijos
     */
    public function contarPadres()
    {
        return CargaFamiliar::orWhere('parentesco_id','=',3)
        ->orWhere('parentesco_id','=',4)
        ->count();
    }

    /**
     * contar hijos
     */
    public function contarAbuelos()
    {
        return CargaFamiliar::orWhere('parentesco_id','=',5)
        ->orWhere('parentesco_id','=',6)
        ->count();
    }
}
