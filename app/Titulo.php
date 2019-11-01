<?php

namespace App;

use App\EstudioRealizado;
use App\EstadoSocio;
use App\Titulo;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
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
    public function estudio_realizado()
    {
        return $this->belongsTo('App\EstudioRealizado');
    }

    /**
     * Relación 
     */
    public function grados_academicos_titulos()
    {
        return $this->hasMany('App\GradoAcademicoTitulo');
    }

    /**
     * Relación 
     */
    public function instituciones_titulos()
    {
        return $this->hasMany('App\InstitucionTitulo');
    }

    /**
     * Modificador de titulo
     */
    public function getTituloIdAttribute($valor)
    {
        $titulo_id = $valor;
        $titulo = Titulo::findOrFail($titulo_id);
        $valor = $titulo->nombre;
        return $valor;
    }
}
