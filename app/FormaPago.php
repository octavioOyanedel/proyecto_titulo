<?php

namespace App;

use App\Prestamo;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    // cambia nombre de tabla
    protected $table = 'formas_pago';

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
    public function prestamo()
    {
        return $this->belongsTo('App\Prestamo');
    }
}
