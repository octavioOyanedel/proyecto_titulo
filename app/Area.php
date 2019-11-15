<?php

namespace App;

use App\Socio;
use App\Sede;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','sede_id',
    ];

    /**
     * Modificador de sedes
     */
    public function getSedeIdAttribute($valor)
    {
        if($valor != null){
            $sede_id = $valor;
            $sede = Sede::findOrFail($sede_id);
            $valor = $sede->nombre;
            return $valor;           
        }else{
            return '';
        }

    }

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
    public function sede()
    {
        return $this->belongsTo('App\Sede');
    }

    /**
     * mutator nombre 
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = formatoNombres($value);
    }
}
