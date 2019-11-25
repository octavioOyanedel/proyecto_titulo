<?php

namespace App;

use App\EstudioRealizado;
use App\GradoAcademicoInstitucion;
use App\GradoAcademico;
use App\InstitucionTitulo;
use App\Institucion;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    // cambia nombre de tabla
    protected $table = 'instituciones';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
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
    public function estudio_realizado()
    {
        return $this->belongsTo('App\EstudioRealizado');
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
    public function instituciones_titulos()
    {
        return $this->hasMany('App\InstitucionTitulo');
    }

    /**
     * Obtener ultimo registro creado 
     */
    static public function obtenerUltimaInstitucionIngresada()
    {
        return Institucion::orderBy('created_at', 'DESC')->first();
    }

    /**
     * Obtener id por medio del nombre 
     */
    static public function obtenerIdConNombre($nombre)
    {
        return Institucion::where('nombre','=', $nombre)->get();
    }
}
