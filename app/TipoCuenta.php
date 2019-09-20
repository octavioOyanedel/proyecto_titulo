<?php

namespace App;

use App\Cuenta;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    // cambia nombre de tabla
    protected $table = 'tipos_cuenta';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación 
     */
    public function cuenta()
    {
        return $this->belongsTo('App\Cuenta');
    }
}
