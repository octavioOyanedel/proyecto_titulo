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
    public function detalle_condepto()
    {
        return $this->belongsTo('App\DetalleConcepto');
    }

    /**
     * Relación 
     */
    public function concepto()
    {
        return $this->belongsTo('App\Concepto');
    }

    /**
     * Relación 
     */
    public function registro_contable()
    {
        return $this->belongsTo('App\RegistroContable');
    }
}
