<?php

namespace App;

use App\RegistroContable;
use Illuminate\Database\Eloquent\Model;

class Asociado extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'concepto','nombre',
    ];

    /**
     * scope busqueda por nombre 
     */
    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->orWhere('nombre', 'LIKE', "%$nombre%");
        }
    }

        /**
     * scope busqueda por nombre 
     */
    public function scopeConcepto($query, $concepto)
    {
        if ($concepto) {
            return $query->orWhere('concepto', 'LIKE', "%$concepto%");
        }
    }

    /**
     * Relación 
     */
    public function registro_contable()
    {
        return $this->hasOne('App\RegistroContable');
    }  

    /**
     * mutator nombre  
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = formatoNombres($value);
    }
}
