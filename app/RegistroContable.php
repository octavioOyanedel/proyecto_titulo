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
        'fecha','numero_registro','forma_pago','monto','concepto_id','tipo_registro_contable_id','cuenta_id','asociado_id','socio_id','usuario_id',
    ];

    /**
     * Modificador de tipo de registro
     */
    public function getTipoRegistroContableIdAttribute($valor)
    {
        $tipo_registro_contable_id = $valor;
        $tipo_registro_contable = TipoRegistroContable::findOrFail($tipo_registro_contable_id);
        $valor = $tipo_registro_contable->nombre;
        return $valor;
    }

    /**
     * Modificador de concepto
     */
    public function getConceptoIdAttribute($valor)
    {
        $concepto_id = $valor;
        $concepto = Concepto::findOrFail($concepto_id);
        $valor = $concepto->nombre;
        return $valor;
    }

    /**
     * Modificador de fecha 
     */
    public function getFechaAttribute($valor)
    {
        return formatoFecha($valor);
    }

    /**
     * Modificador de monto
     */
    public function getMontoAttribute($valor)
    {
        return formatoMoneda($valor);
    }

    /**
     * Relación 
     */
    public function concepto()
    {
        return $this->hasOne('App\Concepto');
    }

    /**
     * Relación 
     */
    public function asociado()
    {
        return $this->hasOne('App\Asociado');
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
        return $this->hasOne('App\User');
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
}
