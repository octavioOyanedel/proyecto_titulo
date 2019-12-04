<?php

namespace App;

use App\Socio;
use App\Area;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
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
     * Relación 
     */
    public function areas()
    {
        return $this->hasMany('App\Area');
    }

    /**
     * Obtener sede 
     */
    static public function obtenerSedePorNombre($nombre)
    {
        return Sede::where('nombre', $nombre)->first();
    }

    /**
     * Contar varones 
     */
    public function contarVarones($id)
    {
        return Socio::where([
            ['genero','=','Varón'],
            ['sede_id','=',$id]
        ])->count();
    }

    /**
     * Contar varones 
     */
    public function contarDamas($id)
    {
        return Socio::where([
            ['genero','=','Dama'],
            ['sede_id','=',$id]
        ])->count();
    }

    /**
     * Contar varones 
     */
    public function contarTodos($id)
    {
        return Socio::where([
            ['sede_id','=',$id]
        ])->count();
    }
}
