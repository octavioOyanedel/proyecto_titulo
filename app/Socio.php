<?php

namespace App;

use App\Prestamo;
use App\EstudioRealizadoSocio;
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
}
