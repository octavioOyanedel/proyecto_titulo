<?php

namespace App;

use App\Socio;
use App\Sede;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','sede_id',
    ];

    /**
     * Modificador de sedes
     */
    public function getSedeIdAttribute($valor)
    {
        if($valor != null){
            $sede_id = $valor;
            $sede = Sede::findOrFail($sede_id);
            $valor = $sede->nombre;
            return $valor;
        }else{
            return '';
        }

    }

    /**
     * scope busqueda por nombre
     */
    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->orWhere('nombre', 'LIKE', "%$nombre%");
        }
    }

    /**
     * scope busqueda por sede
     */
    public function scopeSede($query, $sede)
    {
        if ($sede) {
            $sede_id = Sede::obtenerSedePorNombre($sede);
            if($sede_id != null){
                return $query->orWhere('sede_id', '=', $sede_id->id);
            }
        }
    }

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
    public function sede()
    {
        return $this->belongsTo('App\Sede');
    }

    /**
     * mutator nombre
     */
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst($value);
    }

    /**
     * Obtener sede 
     */
    static public function obtenerAreaPorNombre($nombre)
    {
        return Area::where('nombre', $nombre)->first();
    }

    /**
     * Contar varones 
     */
    public function contarVarones($id)
    {
        return Socio::where([
            ['genero','=','Varón'],
            ['area_id','=',$id]
        ])->count();
    }

    /**
     * Contar damas 
     */
    public function contarDamas($id)
    {
        return Socio::where([
            ['genero','=','Dama'],
            ['area_id','=',$id]
        ])->count();
    }

    /**
     * Contar varones 
     */
    public function contarTodos($id)
    {
        return Socio::where([
            ['area_id','=',$id]
        ])->count();
    }
}
