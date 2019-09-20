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
        return $this->belongsTo('App\RegistroContable');
    }
}
