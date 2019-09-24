<?php

namespace App;

use App\EstadoDeuda;
use App\Prestamo;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha_pago','numero_cuota','monto','prestamo_id','estado_deuda_id',
    ];

    /**
     * Modificador de interes
     */
    public function getEstadoDeudaIdAttribute($valor)
    {
        $estado_deuda_id = $valor;
        $estado_deuda = EstadoDeuda::findOrFail($estado_deuda_id);
        $valor = $estado_deuda->nombre;
        return $valor;
    }

    /**
     * Modificador de fecha de nacimiento
     */
    public function getFechaPagoAttribute($valor)
    {
        return formatoFecha($valor);
    }

    /**
     * Modificador de fecha sind1
     */
    public function getMontoAttribute($valor)
    {
        return formatoMoneda($valor);
    }

    /**
     * Relación 
     */
    public function estado_deuda()
    {
        return $this->hasOne('App\EstadoDeuda');
    }  

    /**
     * Relación 
     */
    public function prestamo()
    {
        return $this->belongsTo('App\Prestamo');
    }   
}
