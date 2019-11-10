<?php

namespace App;

use App\Socio;
use App\Cuota;
use App\EstadoDeuda;
use App\Interes;
use App\FormaPago;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha_solicitud','numero_egreso','cheque','deposito','fecha_pago_deposito','monto','numero_cuotas','socio_id','estado_deuda_id','interes_id','forma_pago_id',
    ];

    /**
     * scope busqueda por numero egreso
     */
    public function scopeNumeroEgreso($query, $numero_egreso)
    {
        if ($numero_egreso) {
            return $query->orWhere('numero_egreso', 'LIKE', "%$numero_egreso%");
        }
    }

    /**
     * scope busqueda por numero de cheque
     */
    public function scopeCheque($query, $cheque)
    {
        if ($cheque) {
            return $query->orWhere('cheque', 'LIKE', "%$cheque%");
        }
    }

    /**
     * Modificador de estado deuda
     */
    public function getEstadoDeudaIdAttribute($valor)
    {
        if($valor != null){
            $estado_deuda_id = $valor;
            $estado_deuda = EstadoDeuda::findOrFail($estado_deuda_id);
            $valor = $estado_deuda->nombre;
            return $valor;
        }else{
            return '';
        }            
    }

    /**
     * Modificador de interes
     */
    public function getInteresIdAttribute($valor)
    {
        if($valor != null){
            $interes_id = $valor;
            $interes = Interes::findOrFail($interes_id);
            $valor = $interes->cantidad;
            return $valor;
        }else{
            return '';
        }     
    }

    /**
     * Modificador de forma pago
     */
    public function getFormaPagoIdAttribute($valor)
    {
        if($valor != null){
            $forma_pago_id = $valor;
            $forma_pago = FormaPago::findOrFail($forma_pago_id);
            $valor = $forma_pago->nombre;
            return $valor;
        }else{
            return '';
        }     
    }

    /**
     * Modificador de monto
     */
    public function getMontoAttribute($valor)
    {
        if($valor != null){
            return formatoMoneda($valor);
        }else{
            return '';
        }            
    }

    /**
     * Modificador de fecha de nacimiento
     */
    public function getFechaSolicitudAttribute($valor)
    {
        if($valor != null){
            return formatoFecha($valor);
        }else{
            return '';
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
        return $this->belongsTo('App\Interes');
    }
    
    /**
     * Relación 
     */
    public function forma_pago()
    {
        return $this->hasOne('App\FormaPago');
    } 

    /**
     * Verificar si socio cuenta con préstamo activo 
     */
    static public function verificarPrestamoPendiente($id)
    {
        $prestamos = Prestamo::where([
            ['socio_id','=',$id],
            ['estado_deuda_id','=',2] // 1-pagada; 2-pendiente
        ])->get();
        if($prestamos->count() > 0){
            return 1; // tiene prestamos
        }else{
            return 2; // no tiene prestamos
        }
    }

    static public function agregarCuotasPrestamo(Prestamo $prestamo)
    {
        $cuotas = $prestamo->numero_cuotas;
        $fecha = $prestamo->fecha_solicitud;
        $dia_pago = 25;
        $year_inicio = 0;
        $mes_inicio = 0;
        $fecha_cuota = '';
        $montoConInteres = ((2 / 100) * $prestamo->getOriginal('monto')) + $prestamo->getOriginal('monto');
        $montoCouta = $montoConInteres / $prestamo->numero_cuotas;
        //obtener año, mes y dia
        $year = substr($fecha,0,-6);
        $mes = substr($fecha,5,-3);
        $dia = substr($fecha,8);
        $year_pago = $year + 0; //casteo a entreo
        //mes de inicio
        if($dia < 15){
            $mes_inicio = $mes + 0; //casteo a entero
        }else{
            //inicio mes siguiente
            $mes_inicio = $mes + 1;
            if($mes_inicio == 13){
                $mes_inicio = 1;
                $year_pago++; 
            }      
        }
        $year_inicio = $year;
        $mes_pago = $mes_inicio;
        //loop cuotas
        for($i = 0; $i < $cuotas; $i++){
            if($mes_pago > 12){
                $mes_pago = 1;
                $year_pago++; 
            }
            if($mes_pago < 10){
                $mes_pago = '0'.$mes_pago;
            }      
            $fecha_cuota = (string)$year_pago.'-'.$mes_pago.'-'.$dia_pago;
            $cuota = new Cuota;
            $cuota->fecha_pago = $fecha_cuota;
            $cuota->numero_cuota = $i + 1;
            $cuota->monto = $montoCouta;
            $cuota->estado_deuda_id = 2;
            $cuota->prestamo_id = $prestamo->id;
            $cuota->save();
            $mes_pago++;       
        }
    }

    /**
     * Obtener ultimo registro creado 
     */
    static public function obtenerUltimoPrestamoIngresado()
    {
        return Prestamo::orderBy('created_at', 'DESC')->first();
    }
}
