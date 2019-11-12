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
     * Relación 
     */
    public function registro_contable()
    {
        return $this->hasOne('App\RegistroContable');
    }  
}
