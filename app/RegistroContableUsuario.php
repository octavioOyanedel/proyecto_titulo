<?php

namespace App;

use App\RegistroContable;
use App\Socio;
use Illuminate\Database\Eloquent\Model;

class RegistroContableUsuario extends Model
{
    // cambia nombre de tabla
    protected $table = 'registros_contables_usuarios';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'usuario_id','registro_contable_id',
    ];

    /**
     * Relación 
     */
    public function RegistroContable()
    {
        return $this->hasOne('App\RegistroContable');
    } 

    /**
     * Relación 
     */
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }
}
