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
        'asociado_a','observaciones','detalle_concepto_id','tipo_registro_contable_id',
    ];

    /**
     * Relación 
     */
    public function detalle_concepto()
    {
        return $this->hasOne('App\DetalleConcepto');
    }   

    /**
     * Relación 
     */
    public function registros_contables()
    {
        return $this->BelongsToMany('App\RegistroContable');
    }
}
