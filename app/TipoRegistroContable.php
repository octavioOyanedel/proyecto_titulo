<?php

namespace App;

use App\DetalleConcepto;
use App\Concepto;
use App\RegistroContable;
use Illuminate\Database\Eloquent\Model;

class TipoRegistroContable extends Model
{
    // cambia nombre de tabla
    protected $table = 'tipos_registro_contable';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
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
    public function registro_contable()
    {
        return $this->belongsTo('App\RegistroContable');
    }

}
