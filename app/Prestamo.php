<?php

namespace App;

use App\Socio;
use App\Cuota;
use App\EstadoDeuda;
use App\Interes;
use App\FormaPago;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha_solicitud','numero_egreso','cheque','monto','numero_cuotas','rut','estado_deuda_id','interes_id','forma_pago_id',
    ];

    /**
     * Modificador de estado deuda
     */
    public function getEstadoDeudaIdAttribute($valor)
    {
        $estado_deuda_id = $valor;
        $estado_deuda = EstadoDeuda::findOrFail($estado_deuda_id);
        $valor = $estado_deuda->nombre;
        return $valor;
    }

    /**
     * Modificador de interes
     */
    public function getInteresIdAttribute($valor)
    {
        $interes_id = $valor;
        $interes = Interes::findOrFail($interes_id);
        $valor = $interes->cantidad;
        return formatoInteres($valor);
    }

    /**
     * Modificador de forma pago
     */
    public function getFormaPagoIdAttribute($valor)
    {
        $forma_pago_id = $valor;
        $forma_pago = FormaPago::findOrFail($forma_pago_id);
        $valor = $forma_pago->nombre;
        return $valor;
    }

    /**
     * Modificador de monto
     */
    public function getMontoAttribute($valor)
    {
        return formatoMoneda($valor);
    }

    /**
     * Modificador de fecha de nacimiento
     */
    public function getFechaSolicitudAttribute($valor)
    {
        return formatoFecha($valor);
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
    public function cuotas()
    {
        return $this->hasMany('App\Cuota');
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
    public function interes()
    {
        return $this->hasOne('App\Interes');
    }
    
    /**
     * Relación 
     */
    public function forma_pago()
    {
        return $this->hasOne('App\FormaPago');
    } 
}
