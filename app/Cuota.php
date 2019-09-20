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
