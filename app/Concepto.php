<?php

namespace App;

use App\Concepto;
use App\RegistroContable;
use App\TipoRegistroContable;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','tipo_registro_contable_id',
    ];

    /**
     * Obtener tipo cuenta
     */
    static public function obtenerConceptoPorNombre($nombre)
    {
        return Concepto::where('nombre', $nombre)->first();
    }

    /**
     * Relación 
     */
    public function registros_contables()
    {
        return $this->BelongsToMany('App\RegistroContable');
    }

    /**
     * Relación 
     */
    public function concepto()
    {
        return $this->hasOne('App\Concepto');
    }

    /**
     * Modificador de tipo registro
     */
    public function getTipoRegistroContableIdAttribute($valor)
    {
        if($valor != null){
            $tipo_id = $valor;
            $tipo = TipoRegistroContable::findOrFail($tipo_id);
            $valor = $tipo->nombre;
            return $valor;        
        }else{
            return '';
        }
    }

}
