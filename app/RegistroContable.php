<?php

namespace App;

use App\Concepto;
use App\TipoRegistroContable;
use App\RegistroContableUsuario;
use App\Cuenta;
use App\Asociado;
use App\Socio;
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
        return $this->hasOne('App\Socio');
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
        return $this->hasOne('App\Cuenta');
    } 
}
