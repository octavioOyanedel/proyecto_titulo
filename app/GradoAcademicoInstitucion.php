<?php

namespace App;

use App\Institucion;
use App\GradoAcademico;
use Illuminate\Database\Eloquent\Model;

class GradoAcademicoInstitucion extends Model
{
    // cambia nombre de tabla
    protected $table = 'grados_academicos_instituciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grado_academico_id', 'institucion_id',
    ];

    /**
     * Relación 
     */
    public function socio()
    {
        return $this->belongsTo('App\Institucion');
    }

    /**
     * Relación 
     */
    public function grado_academico()
    {
        return $this->belongsTo('App\GradoAcademico');
    } 

    /**
     * Modificador de institucion
     */
    public function getInstitucionIdAttribute($valor)
    {
        $institucion_id = $valor;
        $institucion = Institucion::findOrFail($institucion_id);
        $valor = $institucion->nombre;
        return $valor;
    }    
}
