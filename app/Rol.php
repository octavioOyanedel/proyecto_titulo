<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    // cambia nombre de tabla
    protected $table = 'roles';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación 
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    /**
     * Obtener ultimo registro creado
     */
    static public function obtenerRolPorNombre($nombre)
    {
        return Rol::where('nombre','=',$nombre)->first();
    }
}
