<?php

namespace App;

use App\Socio;
use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    // cambia nombre de tabla
    protected $table = 'nacionalidades';

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
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }

    /**
     * mutator nombre 
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst($value);
    }

    /**
     * Contar varones 
     */
    public function contarVarones($id)
    {
        return Socio::where([
            ['genero','=','Varón'],
            ['nacionalidad_id','=',$id]
        ])->count();
    }

    /**
     * Contar damas 
     */
    public function contarDamas($id)
    {
        return Socio::where([
            ['genero','=','Dama'],
            ['nacionalidad_id','=',$id]
        ])->count();
    }

    /**
     * Contar varones 
     */
    public function contarTodos($id)
    {
        return Socio::where([
            ['nacionalidad_id','=',$id]
        ])->count();
    }
}
