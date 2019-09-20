<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class LogSistema extends Model
{
    // cambia nombre de tabla
    protected $table = 'log_sistema';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha','accion','ip','navegador','sistema','usuario_id',
    ];

    /**
     * Relación 
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
