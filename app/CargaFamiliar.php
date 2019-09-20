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
        'rut','nombre1','nombre2','apellido1','apellido2','fecha_nac','rut_socio','parentesco_id',
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
    public function parentesco()
    {
        return $this->hasOne('App\Parentesco');
    }       
}
