<?php

namespace App;

use App\Socio;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
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
        $this->attributes['nombre'] = formatoNombres($value);
    }

    /**
     * Obtener cargo 
     */
    static public function obtenerCargoPorNombre($nombre)
    {
        return Cargo::where('nombre', $nombre)->first();
    }

    /**
     * Contar varones 
     */
    public function contarVarones($id)
    {
        return Socio::where([
            ['genero','=','Varón'],
            ['cargo_id','=',$id]
        ])->count();
    }

    /**
     * Contar damas 
     */
    public function contarDamas($id)
    {
        return Socio::where([
            ['genero','=','Dama'],
            ['cargo_id','=',$id]
        ])->count();
    }

    /**
     * Contar varones 
     */
    public function contarTodos($id)
    {
        return Socio::where([
            ['cargo_id','=',$id]
        ])->count();
    }
}
