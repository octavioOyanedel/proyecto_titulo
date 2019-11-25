<?php

namespace App;

use App\TipoCuenta;
use App\Banco;
use App\Cuenta;
use App\RegistroContable;
use App\Prestamo;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'numero','tipo_cuenta_id','banco_id',
    ];

    /**
     * Obtener cuenta 
     */
    static public function obtenerCuentaPorNumero($numero)
    {
        return Cuenta::where('numero', $numero)->first();
    }

    /**
     * Obtener cuenta 
     */
    static public function obtenerCuentaPorBanco($id)
    {
        return Cuenta::where('banco_id', $id)->first();
    }

    /**
     * Modificador de tipo cuenta
     */
    public function getTipoCuentaIdAttribute($valor)
    {
        $tipo_cuenta_id = $valor;
        $tipo_cuenta = TipoCuenta::findOrFail($tipo_cuenta_id);
        $valor = $tipo_cuenta->nombre;
        return $valor;
    }

    /**
     * Modificador de banco
     */
    public function getBancoIdAttribute($valor)
    {
        $banco_id = $valor;
        $banco = Banco::findOrFail($banco_id);
        $valor = $banco->nombre;
        return $valor;
    }

    /**
     * Relación 
     */
    public function tipo_cuenta()
    {
        return $this->hasOne('App\TipoCuenta');
    }  

    /**
     * Relación 
     */
    public function banco()
    {
        return $this->hasOne('App\Banco');
    }  

    /**
     * Relación 
     */
    public function registro_contable()
    {
        return $this->hasOne('App\RegistroContable');
    }

    /**
     * Relación 
     */
    public function prestamos()
    {
        return $this->belongTo('App\Prestamo');
    }

    /**
     * mutator numero cuenta 
     */
    public function setNumeroAttribute($value)
    {
        $this->attributes['numero'] = formatoNombres($value);
    }
}
