<?php

namespace App;

use App\Concepto;
use App\TipoRegistroContable;
use App\RegistroContableUsuario;
use App\Cuenta;
use App\Asociado;
use App\Socio;
use App\User;
use Illuminate\Database\Eloquent\Model;

class RegistroContable extends Model
{
    // cambia nombre de tabla
    protected $table = 'registros_contables';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha','numero_registro','forma_pago','monto','concepto_id','detalle','tipo_registro_contable_id','cuenta_id','asociado_id','socio_id','usuario_id',
    ];

//scope filtro
//***************************************************************************************************************
    /**
     * scope busqueda fecha de solicitud
     */
    public function scopeFechaSolicitud($query, $fecha_ini, $fecha_fin)
    {
        if($fecha_ini != null && $fecha_fin != null){
            return $query->whereBetween('fecha', [date($fecha_ini),date($fecha_fin)]);
        }
        if($fecha_ini != null && $fecha_fin === null){
             return $query->where('fecha','>=',$fecha_ini);
        }
        if($fecha_ini === null && $fecha_fin != null){
             return $query->where('fecha','<=',$fecha_fin);
        }
    }

    /**
     * scope busqueda monto
     */
    public function scopeMonto($query, $monto_ini, $monto_fin)
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
     * scope busqueda forma pago
     */
    public function scopeTipoRegistroContableId($query, $tipo)
    {
        if($tipo != null){
            return $query->Where('tipo_registro_contable_id','=',$tipo);
        }
    }

    /**
     * scope busqueda cuenta
     */
    public function scopeCuentaId($query, $cuenta)
    {
        if($cuenta != null){
            return $query->Where('cuenta_id','=',$cuenta);
        }
    }

    /**
     * scope busqueda concepto
     */
    public function scopeConceptoId($query, $id)
    {
        if($id != null && $id != 'Seleccione...'){
            return $query->Where('concepto_id','=',$id);
        }
    }

    /**
     * scope busqueda socio
     */
    public function scopeSocioId($query, $socio)
    {
        if($socio != null){
            return $query->Where('socio_id','=',$socio);
        }
    }

    /**
     * scope busqueda asociado
     */
    public function scopeAsociadoId($query, $asociado)
    {
        if($asociado != null){
            return $query->Where('asociado_id','=',$asociado);
        }
    }

    /**
     * scope busqueda asociado
     */
    public function scopeDetalle($query, $detalle)
    {
        if($detalle != null){
            return $query->Where('detalle','LIKE',"%$detalle%");
        }
    }
//***************************************************************************************************************
    /**
     * scope busqueda monto
     */
    static public function scopeMontoUnico($query, $monto)
    {
        if($monto != null){
            return $query->orWhere('monto','=', $monto);
        }
    }


    /**
     * scope busqueda por numero de registro
     */
    public function scopeNumeroRegistro($query, $numero_registro)
    {
        if ($numero_registro) {
            return $query->orWhere('numero_registro', '=', $numero_registro);
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
     * Modificador de tipo de registro
     */
    public function getTipoRegistroContableIdAttribute($valor)
    {
        if($valor != null){
            $tipo_registro_contable_id = $valor;
            $tipo_registro_contable = TipoRegistroContable::findOrFail($tipo_registro_contable_id);
            $valor = $tipo_registro_contable->nombre;
            return $valor;
        }else{
            return '';
        }        
    }

    /**
     * Modificador de concepto
     */
    public function getConceptoIdAttribute($valor)
    {
        if($valor != null){
            $concepto_id = $valor;
            $concepto = Concepto::findOrFail($concepto_id);
            $valor = $concepto->nombre;
            return $valor;
        }else{
            return '';
        }        
    }

    /**
     * Modificador de fecha 
     */
    public function getFechaAttribute($valor)
    {
        if($valor != null){
            return formatoFecha($valor);
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
     * Relación      */
    public function concepto()
    {
        return $this->hasOne('App\Concepto');
    }

    /**
     * Relación 
     */
    public function asociado()
    {
        return $this->belongsTo('App\Asociado');
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
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relación 
     */

    public function tipo_registro_contable()
    {
        return $this->hasOne('App\TipoRegistroContable');
    } 

    /**
     * Relación 
     */
    public function cuenta()
    {
        return $this->belongsTo('App\Cuenta');
    } 

    /**
     * Obtener ultimo registro creado
     */
    static public function obtenerTipoRegistroContablePorNombre($nombre)
    {
        return TipoRegistroContable::where('nombre','=',$nombre)->first();
    }

}
