<?php

namespace App;

use App\Prestamo;
use App\EstudioRealizadoSocio;
use App\EstudioRealizado;
use App\Comuna;
use App\Ciudad;
use App\Sede;
use App\Area;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;
use App\CargaFamiliar;
use App\RegistroContable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre1','nombre2','apellido1','apellido2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id',
    ];

    /**
     * scope busqueda por rut
     */
    public function scopeRut($query, $rut)
    {
        if ($rut) {
            return $query->orWhere('rut', 'LIKE', "%$rut%");
        }
    }
    
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
     * scope busqueda por celular
     */
    public function scopeCelular($query, $celular)
    {
        if ($celular) {
            return $query->orWhere('celular', 'LIKE', "%$celular%");
        }
    }

    /**
     * scope busqueda por anexo
     */
    public function scopeAnexo($query, $anexo)
    {
        if ($anexo) {
            return $query->orWhere('anexo', 'LIKE', "%$anexo%");
        }
    }

    /**
     * scope busqueda por anexo
     */
    public function scopeCorreo($query, $correo)
    {
        if ($correo) {
            return $query->orWhere('correo', 'LIKE', "%$correo%");
        }
    }

    /**
     * scope busqueda por anexo
     */
    public function scopeDireccion($query, $direccion)
    {
        if ($direccion) {
            return $query->orWhere('direccion', 'LIKE', "%$direccion%");
        }
    }

    /**
     * Modificador de comuna
     */
    public function getComunaIdAttribute($valor)
    {
        if($valor != null){
            $comuna_id = $valor;
            $comuna = Comuna::findOrFail($comuna_id);
            $valor = $comuna->nombre;
            return $valor;        
        }else{
            return '';
        }

    }

    /**
     * Modificador de ciudad
     */
    public function getCiudadIdAttribute($valor)
    {
        if($valor != null){
            $ciudad_id = $valor;
            $ciudad = Ciudad::findOrFail($ciudad_id);
            $valor = $ciudad->nombre;
            return $valor;
        }else{
            return '';
        }
    }
    
    /**
     * Modificador de sedes
     */
    public function getSedeIdAttribute($valor)
    {
        if($valor != null){
            $sede_id = $valor;
            $sede = Sede::findOrFail($sede_id);
            $valor = $sede->nombre;
            return $valor;
        }else{
            return '';
        }
    }

    /**
     * Modificador de areas
     */
    public function getAreaIdAttribute($valor)
    {
        if($valor != null){
            $area_id = $valor;
            $area = Area::findOrFail($area_id);
            $valor = $area->nombre;
            return $valor;
        }else{
            return '';
        }        

    }

    /**
     * Modificador de cargos
     */
    public function getCargoIdAttribute($valor)
    {
        if($valor != null){
            $cargo_id = $valor;
            $cargo = Cargo::findOrFail($cargo_id);
            $valor = $cargo->nombre;
            return $valor;
        }else{
            return '';
        }        
    }
    /**
     * Modificador de estado socio
     */
    public function getEstadoSocioIdAttribute($valor)
    {
        if($valor != null){
            $estado_id = $valor;
            $estado = EstadoSocio::findOrFail($estado_id);
            $valor = $estado->nombre;
            return $valor;
        }else{
            return '';
        }        
    }
    /**
     * Modificador de nacionalidad
     */
    public function getNacionalidadIdAttribute($valor)
    {
        if($valor != null){
            $nacionalidad_id = $valor;
            $nacionalidad = Nacionalidad::findOrFail($nacionalidad_id);
            $valor = $nacionalidad->nombre;
            return $valor;
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
     * Modificador de fecha pucv
     */
    public function getFechaPucvAttribute($valor)
    {
        if($valor != null){
            return formatoFecha($valor);
        }else{
            return '';
        }         
    }

    /**
     * Modificador de fecha sind1
     */
    public function getFechaSind1Attribute($valor)
    {
        if($valor != null){
            return formatoFecha($valor);
        }else{
            return '';
        }         
    }

    /**
     * Relación 
     */
    public function prestamos()
    {
        return $this->hasMany('App\Prestamo');
    }

    /**
     * Relación 
     */
    public function estudios_realizados_socios()
    {
        return $this->hasMany('App\EstudioRealizadoSocio');
    }

    /**
     * Relación 
     */
    public function estudios_realizados()
    {
        return $this->hasManyThrough('App\EstudioRealizado', 'App\EstudioRealizadoSocio');
    }
    
    /**
     * Relación 
     */
    public function comuna()
    {
        return $this->hasOne('App\Comuna');
    }  
    
    /**
     * Relación 
     */
    public function ciudad()
    {
        return $this->hasOne('App\Ciudad');
    }  
    
    /**
     * Relación 
     */
    public function sede()
    {
        return $this->hasOne('App\Sede');
    }   

    /**
     * Relación 
     */
    public function area()
    {
        return $this->hasOne('App\Area');
    } 

    /**
     * Relación 
     */
    public function cargo()
    {
        return $this->hasOne('App\Cargo');
    }  

    /**
     * Relación 
     */
    public function estado_socio()
    {
        return $this->hasOne('App\EstadoSocio');
    }  
    
    /**
     * Relación 
     */
    public function nacionalidad()
    {
        return $this->hasOne('App\Nacionalidad');
    }  
    
    /**
     * Relación 
     */
    public function cargas_familiares()
    {
        return $this->hasMany('App\CargaFamiliar');
    }

    /**
     * Relación 
     */
    public function registros_contables()
    {
        return $this->belongsToMany('App\RegistroContable');
    }

    /**
     * Obtener ultimo registro creado 
     */
    static public function obtenerUltimoSocioIngresado()
    {
        return Socio::orderBy('created_at', 'DESC')->first();
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
}
