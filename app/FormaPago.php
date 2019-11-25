<?php

namespace App;

use App\Prestamo;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    // cambia nombre de tabla
    protected $table = 'formas_pago';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Obtener forma pago 
     */
    static public function obtenerFormaPagoPorNombre($nombre)
    {
        return FormaPago::where('nombre', $nombre)->first();
    }

    /**
     * Relación 
     */
    public function prestamo()
    {
        return $this->belongsTo('App\Prestamo');
    }

    /**
     * mutator nombre 
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = formatoNombres($value);
    }
}
