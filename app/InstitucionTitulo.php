<?php

namespace App;

use App\Institucion;
use App\Titulo;
use Illuminate\Database\Eloquent\Model;

class InstitucionTitulo extends Model
{
    // cambia nombre de tabla
    protected $table = 'instituciones_titulos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institucion_id', 'titulo_id',
    ];

    /**
     * Relación 
     */
    public function institucion()
    {
        return $this->belongsTo('App\Institucion');
    }

    /**
     * Relación 
     */
    public function titulo()
    {
        return $this->belongsTo('App\Titulo');
    } 
}
