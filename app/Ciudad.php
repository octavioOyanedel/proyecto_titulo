<?php

namespace App;

use App\Socio;
use App\Comuna;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    // cambia nombre de tabla
    protected $table = 'ciudades';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','comuna_id',
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
    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }

    /**
     * Contar varones 
     */
    public function contarVarones($id)
    {
        return Socio::where([
            ['genero','=','Varón'],
            ['ciudad_id','=',$id]
        ])->count();
    }

    /**
     * Contar damas 
     */
    public function contarDamas($id)
    {
        return Socio::where([
            ['genero','=','Dama'],
            ['ciudad_id','=',$id]
        ])->count();
    }

    /**
     * Contar varones 
     */
    public function contarTodos($id)
    {
        return Socio::where([
            ['ciudad_id','=',$id]
        ])->count();
    }
}
