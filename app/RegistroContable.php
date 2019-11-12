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

    /**
     * scope busqueda por numero de registro
     */
    public function scopeNumeroRegistro($query, $numero_registro)
    {
        if ($numero_registro) {
            return $query->orWhere('numero_registro', 'LIKE', "%$numero_registro%");
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
}
