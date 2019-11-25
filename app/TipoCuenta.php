<?php

namespace App;

use App\Cuenta;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    // cambia nombre de tabla
    protected $table = 'tipos_cuenta';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Obtener tipo cuenta
     */
    static public function obtenerTipoCuentaPorNombre($nombre)
    {
        return TipoCuenta::where('nombre', $nombre)->first();
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
