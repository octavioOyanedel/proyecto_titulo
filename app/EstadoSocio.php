<?php

namespace App;

use App\Socio;
use Illuminate\Database\Eloquent\Model;

class EstadoSocio extends Model
{
    // cambia nombre de tabla
    protected $table = 'estados_socio';

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
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }
}
