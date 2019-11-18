<?php

namespace App;

use App\CargaFamiliar;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
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
    public function carga_familiar()
    {
        return $this->belongsTo('App\CargaFamiliar');
    }
    
    /**
     * mutator nombre 
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst($value);
    }
}
