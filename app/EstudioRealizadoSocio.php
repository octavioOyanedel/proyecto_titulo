<?php

namespace App;

use App\Socio;
use App\EstudioRealizado;
use Illuminate\Database\Eloquent\Model;

class EstudioRealizadoSocio extends Model
{
    // cambia nombre de tabla
    protected $table = 'estudios_realizados_socios';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'socio_id','estudio_realizado_id',
    ];

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
    public function estudio_realizado()
    {
        return $this->hasOne('App\EstudioRealizado');
    } 
}
