<?php

namespace App;

use App\Ciudad;
use App\Socio;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
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
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }

    /**
     * Relación 
     */
    public function ciudades()
    {
        return $this->hasMany('App\Ciudad');
    }

    /**
     * Contar varones 
     */
    public function contarVarones($id)
    {
        return Socio::where([
            ['genero','=','Varón'],
            ['comuna_id','=',$id]
        ])->count();
    }

    /**
     * Contar damas 
     */
    public function contarDamas($id)
    {
        return Socio::where([
            ['genero','=','Dama'],
            ['comuna_id','=',$id]
        ])->count();
    }

    /**
     * Contar varones 
     */
    public function contarTodos($id)
    {
        return Socio::where([
            ['comuna_id','=',$id]
        ])->count();
    }
}
