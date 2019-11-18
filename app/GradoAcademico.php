<?php

namespace App;

use App\EstudioRealizado;
use App\GradoAcademicoInstitucion;
use App\GradoAcademicoTitulo;
use Illuminate\Database\Eloquent\Model;

class GradoAcademico extends Model
{
    // cambia nombre de tabla
    protected $table = 'grados_academicos';

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
    public function grados_academicos_instituciones()
    {
        return $this->hasMany('App\GradoAcademicoInstitucion');
    }

    /**
     * Relación 
     */
    public function grados_academicos_titulos()
    {
        return $this->hasMany('App\GradoAcademicoTitulo');
    }


}
