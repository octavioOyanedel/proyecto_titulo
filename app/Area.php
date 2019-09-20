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
}
