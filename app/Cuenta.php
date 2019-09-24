<?php

namespace App;

use App\TipoCuenta;
use App\Banco;
use App\RegistroContable;
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
}
