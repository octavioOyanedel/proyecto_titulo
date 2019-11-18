<?php

namespace App;

use App\Socio;
use App\Titulo;
use App\Institucion;
use App\GradoAcademico;
use App\EstadoGradoAcademico;
use App\EstudioRealizadoSocio;
use Illuminate\Database\Eloquent\Model;

class EstudioRealizado extends Model
{
    // cambia nombre de tabla
    protected $table = 'estudios_realizados';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'titulo_id','institucion_id','grado_academico_id','estado_grado_academico_id',
    ];

    /**
     * Modificador de titulo
     */
    public function getTituloIdAttribute($value)
    {
        if($value != null){
            $titulo_id = $value;
            $titulo = Titulo::findOrFail($titulo_id);
            $value = $titulo->nombre;
            return $value;
        }else{
            return '';
        }                
    }

    /**
     * Modificador de institucion
     */
    public function getInstitucionIdAttribute($value)
    {
        if($value != null){
            $institucion_id = $value;
            $institucion = Institucion::findOrFail($institucion_id);
            $value = $institucion->nombre;
            return $value;
        }else{
            return '';
        }                
    }

    /**
     * Modificador de grado academico
     */
    public function getGradoAcademicoIdAttribute($value)
    {
        if($value != null){
            $grado_academico_id = $value;
            $grado_academico = GradoAcademico::findOrFail($grado_academico_id);
            $value = $grado_academico->nombre;
            return $value;
        }else{
            return '';
        }                
    }

    /**
     * Modificador de grado academico
     */
    public function getEstadoGradoAcademicoIdAttribute($value)
    {
        if($value != null){
            $estado_grado_academico_id = $value;
            $estado_grado_academico = EstadoGradoAcademico::findOrFail($estado_grado_academico_id);
            $value = $estado_grado_academico->nombre;
            return $value;
        }else{
            return '';
        }                
    }

    /**
     * Relación 
     */
    public function titulo()
    {
        return $this->hasOne('App\Titulo');
    }   

    /**
     * Relación 
     */
    public function institucion()
    {
        return $this->hasOne('App\Institucion');
    }   

    /**
     * Relación 
     */
    public function grado_academico()
    {
        return $this->hasOne('App\GradoAcademico');
    }   

    /**
     * Relación 
     */
    public function estado_grado_academico()
    {
        return $this->hasOne('App\EstadoGradoAcademico');
    }   

    /**
     * Relación 
     */
    public function estudios_realizados_socios()
    {
        return $this->hasMany('App\EstudioRealizadoSocio');
    } 

    /**
     * Obtener ultimo registro creado 
     */
    static public function obtenerUltimoEstudioIngresado()
    {
        return EstudioRealizado::orderBy('created_at', 'DESC')->first();
    }

}
