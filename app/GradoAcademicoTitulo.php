<?php

namespace App;

use App\GradoAcademico;
use App\Titulo;
use Illuminate\Database\Eloquent\Model;

class GradoAcademicoTitulo extends Model
{
    // cambia nombre de tabla
    protected $table = 'grados_academicos_titulos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grado_academico_id', 'titulo_id',
    ];

    /**
     * Relación 
     */
    public function grado_academico()
    {
        return $this->belongsTo('App\GradoAcademico');
    }

    /**
     * Relación 
     */
    public function titulo()
    {
        return $this->belongsTo('App\Titulo');
    } 
}
