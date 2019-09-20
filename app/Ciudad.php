<?php

namespace App;

use App\Socio;
use App\Comuna;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    // cambia nombre de tabla
    protected $table = 'ciudades';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','comuna_id',
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
    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }
}
