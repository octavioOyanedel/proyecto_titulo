<?php

namespace App;

use App\Concepto;
use App\TipoRegistroContable;
use Illuminate\Database\Eloquent\Model;

class DetalleConcepto extends Model
{
    // cambia nombre de tabla
    protected $table = 'detalles_concepto';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','tipo_registro_contable_id',
    ];

    /**
     * Relación 
     */
    public function conceptos()
    {
        return $this->BelongsToMany('App\Concepto');
    }

    /**
     * Relación 
     */
    public function tipo_registro_contable()
    {
        return $this->hasOne('App\TipoRegistroContable');
    }   

}
