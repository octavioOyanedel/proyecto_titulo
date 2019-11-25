<?php

namespace App;

use App\Prestamo;
use App\Cuota;
use Illuminate\Database\Eloquent\Model;

class EstadoDeuda extends Model
{
    // cambia nombre de tabla
    protected $table = 'estados_deuda';

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
    public function prestamo()
    {
        return $this->belongsTo('App\Prestamo');
    }

    /**
     * Relación 
     */
    public function cuota()
    {
        return $this->belongsTo('App\Cuota');
    }

    /**
     * Obtener cargo 
     */
    static public function obtenerEstadoPorNombre($nombre)
    {
        return EstadoDeuda::where('nombre', $nombre)->first();
    }
}
