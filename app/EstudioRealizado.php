<?php

namespace App;

use App\Titulo;
use App\Institucion;
use App\GradoAcademico;
use App\EstadoGradoAcademico;
use App\Socio;
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
        'rut','titulo_id','institucion_id','grado_academico_id','estado_grado_academico_id',
    ];

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
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }   
}
