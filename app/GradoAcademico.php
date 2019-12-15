<?php

namespace App;

use App\Socio;
use App\Titulo;
use App\Institucion;
use App\EstudioRealizado;
use App\GradoAcademicoTitulo;
use App\GradoAcademicoInstitucion;
use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model
{
    // cambia nombre de tabla
    protected $table = 'grados_academicos';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
    ];

    /**
     * scope busqueda por nombre 1
     */
    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->orWhere('nombre', 'LIKE', "%$nombre%");
        }
    }

    /**
     * Relación 
     */
    public function estudio_realizado()
    {
        return $this->belongsTo('App\EstudioRealizado');
    }

    /**
     * Relación 
     */
    public function institucion()
    {
        return $this->belongsTo('App\Institucion');
    }

    /**
     * Relación 
     */
    public function titulo()
    {
        return $this->belongsTo('App\Titulo');
    }

    /**
     * Relación 
     */
    public function grados_academicos_instituciones()
    {
        return $this->hasMany('App\GradoAcademicoInstitucion');
    }

    /**
     * Relación 
     */
    public function grados_academicos_titulos()
    {
        return $this->hasMany('App\GradoAcademicoTitulo');
    }

    /**
     * Contar contar socios 
     */
    public function contarEstudiosPorSocio($nombre)
    {
        //contar cantidad de socios que tengan este nombre de nivel academico
        $grado_id = $this->obtenerIdPorNombre($nombre)->id;

        $cantidad = Socio::orderBy('apellido1','ASC')
        ->join('estudios_realizados_socios','estudios_realizados_socios.socio_id','=','socios.id')
        ->join('estudios_realizados','estudios_realizados_socios.estudio_realizado_id','=','estudios_realizados.id')
        ->join('grados_academicos','estudios_realizados.grado_academico_id','=','grados_academicos.id')
        ->where('estudios_realizados.grado_academico_id','=',$grado_id)
        ->count();
        return $cantidad;
    }  

    /**
     * Obtener grado academico 
     */
    public function obtenerIdPorNombre($nombre)
    {
        return GradoAcademico::where('nombre', $nombre)->first();
    }    

}
