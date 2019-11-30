<?php

namespace App;

use App\EstudioRealizado;
use App\EstadoSocio;
use App\Titulo;
use App\GradoAcademico;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre', 'grado_academico_id',
    ];

    /**
     * scope busqueda por nombre 
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
    public function grados_academicos()
    {
        return $this->hasMany('App\GradoAcademico');
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
    public function grados_academicos_titulos()
    {
        return $this->hasMany('App\GradoAcademicoTitulo');
    }

    /**
     * Relación 
     */
    public function instituciones_titulos()
    {
        return $this->hasMany('App\InstitucionTitulo');
    }

    /**
     * Modificador de titulo
     */
    public function getTituloIdAttribute($valor)
    {
        $titulo_id = $valor;
        $titulo = Titulo::findOrFail($titulo_id);
        $valor = $titulo->nombre;
        return $valor;
    }

    /**
     * Modificador de ciudad
     */
    public function getGradoAcademicoIdAttribute($valor)
    {
        if($valor != null){
            $grado_academico_id = $valor;
            $grado_academico = GradoAcademico::findOrFail($grado_academico_id);
            $valor = $grado_academico->nombre;
            return $valor;
        }else{
            return '';
        }
    }

    /**
     * mutator nombre 
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = formatoNombres($value);
    }
}
