<?php

namespace App;

use App\Socio;
use App\Titulo;
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

    /**
     * Relación 
     */
    public function titulos()
    {
        return $this->hasMany('App\Titulo');
    } 
}
