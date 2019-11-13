<?php

namespace App;

use App\Socio;
use App\Area;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
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
    public function areas()
    {
        return $this->hasMany('App\Area');
    }

    /**
     * mutator nombre 
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = formatoNombres($value);
    }
}
