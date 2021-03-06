<?php

namespace App;

use App\EstudioRealizado;
use Illuminate\Database\Eloquent\Model;

class EstadoGradoAcademico extends Model
{
    // cambia nombre de tabla
    protected $table = 'estados_grado_academico';

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
     * mutator nombre 
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst($value);
    }
}
