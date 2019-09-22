<?php

namespace App;

use App\DetalleConcepto;
use App\RegistroContable;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','detalle',
    ];

    /**
     * Relación 
     */
    public function registros_contables()
    {
        return $this->BelongsToMany('App\RegistroContable');
    }
}
