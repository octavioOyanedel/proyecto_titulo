<?php

namespace App;

use App\Prestamo;
use App\Interes;
use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
    // cambia nombre de tabla
    protected $table = 'intereses';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'cantidad',
    ];

    /**
     * Relación 
     */
    public function prestamo()
    {
        return $this->hasMany('App\Prestamo');
    }

}
