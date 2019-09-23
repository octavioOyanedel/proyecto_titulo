<?php

namespace App;

use App\Socio;
use App\Parentesco;
use Illuminate\Database\Eloquent\Model;

class CargaFamiliar extends Model
{
    // cambia nombre de tabla
    protected $table = 'cargas_familiares';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'rut','nombre1','nombre2','apellido1','apellido2','fecha_nac','socio_id','parentesco_id',
    ];

    /**
     * Modificador de parentescos
     */
    public function getParentescoIdAttribute($value)
    {
        $parentesco_id = $value;
        $parentesco = Parentesco::findOrFail($parentesco_id);
        $value = $parentesco->nombre;
        return $value;
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
    public function parentesco()
    {
        return $this->hasOne('App\Parentesco');
    }       
}
