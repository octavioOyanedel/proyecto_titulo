<?php

namespace App;

use App\Socio;
use App\Cuota;
use App\EstadoDeuda;
use App\Interes;
use App\FormaPago;
use App\Cuenta;
use App\TipoCuenta;
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
        'fecha_solicitud','numero_egreso','cuenta_id','cheque','fecha_pago_deposito','monto','numero_cuotas','socio_id','estado_deuda_id','interes_id','forma_pago_id',
    ];

//scope filtro
//***************************************************************************************************************

    /**
     * scope busqueda estado prestamo
     */
    public function scopeEstadoDeudaFiltro($query, $estado)
    {
        if($estado != null){
            return $query->where('estado_deuda_id','=',$estado);
        }
    }

    /**
     * scope busqueda rut
     */
    public function scopeRutFiltro($query, $rut)
    {
        if ($rut) {
            $socio = Socio::obtenerSocioPorRut($rut);
            if($socio != null){
                return $query->where('socio_id', '=', $socio->id);
            }
        }
    }   

    /**
     * scope busqueda fecha de solicitud
     */
    public function scopeFechaSolicitudFiltro($query, $fecha_ini, $fecha_fin)
    {
        if($fecha_ini != null && $fecha_fin != null){
            return $query->whereBetween('fecha_solicitud', [date($fecha_ini),date($fecha_fin)]);
        }
        if($fecha_ini != null && $fecha_fin === null){
             return $query->where('fecha_solicitud','>=',$fecha_ini);
        }
        if($fecha_ini === null && $fecha_fin != null){
             return $query->where('fecha_solicitud','<=',$fecha_fin);
        }
    }

    /**
     * scope busqueda por numero egreso
     */
    public function scopeNumeroEgresoFiltro($query, $numero_egreso)
    {
        if ($numero_egreso) {
            return $query->where('numero_egreso', '=', $numero_egreso);
        }
    }

    /**
     * scope busqueda numero cuenta
     */
    public function scopeNumeroCuentaFiltro($query, $cuenta)
    {
        if ($cuenta) {
            $cuenta_id = Cuenta::obtenerCuentaPorNumero($cuenta);
            if($cuenta_id != null){
                return $query->where('cuenta_id', '=', $cuenta_id->id);
            }
        }
    }

    /**
     * scope busqueda forma pago
     */
    public function scopeFormaPagoFiltro($query, $forma)
    {
        if ($forma) {
            $forma_id = FormaPago::obtenerFormaPagoPorNombre($forma);
            if($forma_id != null){
                return $query->where('forma_pago_id', '=', $forma_id->id);
            }
        }
    }

    /**
     * scope busqueda por numero de cheque
     */
    public function scopeChequeFiltro($query, $cheque)
    {
        if ($cheque) {
            return $query->where('cheque', '=', $cheque);
        }
    }

    /**
     * scope busqueda monto
     */
    static public function scopeMontoFiltro($query, $monto)
    {
        if($monto != null){
            return $query->where('monto','=', $monto);
        }
    }

    /**
     * scope busqueda monto
     */
    public function scopeMontosFiltro($query, $monto_ini, $monto_fin)
    {
        if($monto_ini != null && $monto_fin != null){
            return $query->whereBetween('monto', [date($monto_ini),date($monto_fin)]);
        }
        if($monto_ini != null && $monto_fin === null){
             return $query->where('monto','>=',$monto_ini);
        }
        if($monto_ini === null && $monto_fin != null){
             return $query->where('monto','<=',$monto_fin);
        }
    }    

    /**
     * scope busqueda fecha de solicitud
     */
    public function scopeFechaPagoFiltro($query, $fecha_ini, $fecha_fin)
    {
        if($fecha_ini != null && $fecha_fin != null){
            return $query->whereBetween('fecha_pago_deposito', [date($fecha_ini),date($fecha_fin)]);
        }
        if($fecha_ini != null && $fecha_fin === null){
             return $query->where('fecha_pago_deposito','>=',$fecha_ini);
        }
        if($fecha_ini === null && $fecha_fin != null){
             return $query->where('fecha_pago_deposito','<=',$fecha_fin);
        }
    }
//***************************************************************************************************************
    /**
     * scope busqueda estado
     */
    public function scopeEstadoDeuda($query, $estado)
    {
        if ($estado) {
            $estado_id = EstadoDeuda::obtenerEstadoPorNombre($estado);
            if($estado_id != null){
                return $query->orWhere('estado_deuda_id', '=', $estado_id->id);
            }
        }
    }

        /**
     * scope busqueda rut
     */
    public function scopeRut($query, $rut)
    {
        if ($rut) {
            $socio = Socio::obtenerSocioPorRut($rut);
            if($socio != null){
                return $query->orWhere('socio_id', '=', $socio->id);
            }
        }
    }   

    /**
     * scope busqueda fecha
     */
    public function scopeFecha($query, $fecha)
    {
        $fecha_formarteada = date("Y-m-d", strtotime($fecha));
        if($fecha != null){
            return $query->orWhere('fecha_solicitud','=',$fecha_formarteada);
        }
    }   

    /**
     * scope busqueda por numero egreso
     */
    public function scopeNumeroEgreso($query, $numero_egreso)
    {
        if ($numero_egreso) {
            return $query->orWhere('numero_egreso', '=', $numero_egreso);
        }
    } 

    /**
     * scope busqueda numero cuenta
     */
    public function scopeNumeroCuenta($query, $cuenta)
    {
        if ($cuenta) {
            $cuenta_id = Cuenta::obtenerCuentaPorNumero($cuenta);
            if($cuenta_id != null){
                return $query->orWhere('cuenta_id', '=', $cuenta_id->id);
            }
        }
    }    

    /**
     * scope busqueda forma pago
     */
    public function scopeFormaPago($query, $forma)
    {
        if ($forma) {
            $forma_id = FormaPago::obtenerFormaPagoPorNombre($forma);
            if($forma_id != null){
                return $query->orWhere('forma_pago_id', '=', $forma_id->id);
            }
        }
    }    

    /**
     * scope busqueda por numero de cheque
     */
    public function scopeCheque($query, $cheque)
    {
        if ($cheque) {
            return $query->orWhere('cheque', '=', $cheque);
        }
    }    

    /**
     * scope busqueda monto
     */
    static public function scopeMonto($query, $monto)
    {
        if($monto != null){
            return $query->orWhere('monto','=', $monto);
        }
    }    
//***************************************************************************************************************

    /**
     * Modificador de cuenta
     */
    public function getCuentaIdAttribute($valor)
    {
        if($valor != null){
            $cuenta_id = $valor;
            $cuenta = Cuenta::findOrFail($cuenta_id);
            $valor = $cuenta->tipo_cuenta_id.' N° '.$cuenta->numero.' - '.$cuenta->banco_id;
            return $valor;
        }else{
            return '';
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
     * Modificador de solicitud
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
     * Modificador de fecha pago deposito
     */
    public function getFechaPagoDepositoAttribute($valor)
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
     * Relación
     */
    public function cuenta()
    {
        return $this->hasOne('App\Cuenta');
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
        $fecha = $prestamo->getOriginal('fecha_solicitud');
        $monto = $prestamo->getOriginal('monto');
        $dia_pago = 25;
        $year_pago = 0;
        $year_inicio = 0;
        $mes_inicio = 0;
        $fecha_cuota = '';
        $array_fecha_cuota = array();
        $montoConInteres = ((2 / 100) * $monto) + $monto;
        $montoCouta = $montoConInteres / $cuotas;

        //obtener año, mes y dia
        $year = substr($fecha,0,-6);
        $mes = substr($fecha,5,-3);
        $dia = substr($fecha,8);

        $year_pago = $year;

        //mes de inicio
        if($dia < 15){
            $mes_inicio = $mes;
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

    /**
     * Obtener ultimo registro creado
     */
    static public function obtenerSocioPorRut($rut)
    {
        return Socio::where('rut','=',$rut)->first();
    }

    /**
     * buscar prestamos pendientes o atrasados
     */
    static public function buscarDeudaActiva()
    {
        return Prestamo::orderBy('created_at', 'DESC')->first();
    }
}
