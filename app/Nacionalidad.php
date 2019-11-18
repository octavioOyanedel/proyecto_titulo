<?php

namespace App;

use App\Socio;
use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    // cambia nombre de tabla
    protected $table = 'nacionalidades';

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
     * mutator nombre 
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst($value);
    }
}
