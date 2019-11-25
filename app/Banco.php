<?php

namespace App;

use App\Cuenta;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
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
     * Obtener banco 
     */
    static public function obtenerBancoPorNombre($nombre)
    {
        return Banco::where('nombre', $nombre)->first();
    }

    /**
     * Relación 
     */
    public function cuenta()
    {
        return $this->belongsTo('App\Cuenta');
    }
    
    /**
     * mutator nombre  
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = formatoNombres($value);
    }
}
