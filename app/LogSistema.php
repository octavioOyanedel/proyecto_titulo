<?php

namespace App;

use App\Socio;
use App\Usuario;
use App\LogSistema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        'fecha','accion','ip','navegador','sistema','usuario_id','correo',
    ];

//scope filtro
//***************************************************************************************************************

    /**
     * scope busqueda fecha
     */
    public function scopeFecha($query, $fecha_ini, $fecha_fin)
    {
        if($fecha_ini != null && $fecha_fin != null){
            return $query->whereBetween('fecha', [date($fecha_ini),date($fecha_fin)]);
        }
        if($fecha_ini != null && $fecha_fin === null){
             return $query->where('fecha','>=',$fecha_ini);
        }
        if($fecha_ini === null && $fecha_fin != null){
             return $query->where('fecha','<=',$fecha_fin);
        }
    }

//***************************************************************************************************************

    /**
     * scope busqueda fecha
     */
    public function scopeFechaUnica($query, $fecha)
    {
        $fecha_formarteada = date("Y-m-d", strtotime($fecha));
        if($fecha != null){
            return $query->orWhere('fecha','LIKE',"%$fecha_formarteada%");
        }
    }

    /**
     * scope busqueda accion
     */
    public function scopeAccion($query, $accion)
    {
        if($accion != null){
            return $query->orWhere('accion','LIKE',"%$accion%");
        }
    }

    /**
     * scope busqueda accion
     */
    public function scopeCorreo($query, $correo)
    {
        if($correo != null){
            return $query->orWhere('correo','LIKE',"%$correo%");
        }
    }

    /**
     * scope busqueda IP
     */
    public function scopeIp($query, $ip)
    {
        if($ip != null){
            return $query->orWhere('ip','=',$ip);
        }
    }

    /**
     * scope busqueda navegador
     */
    public function scopeNavegador($query, $navegador)
    {
        if($navegador != null){
            return $query->orWhere('navegador','=',$navegador);
        }
    }

    /**
     * scope busqueda navegador
     */
    public function scopeSistema($query, $sistema)
    {
        if($sistema != null){
            return $query->orWhere('sistema','LIKE',"%$sistema%");
        }
    }

    /**
     * Relación 
     */
    public function usuario()
    {
        return $this->hasOne('App\Usuario');
    }

    /**
     * Modificador de id
     */
    public function getUsuarioIdAttribute($valor)
    {
        if($valor != null){
            $user_id = $valor;
            $user = User::findOrFail($user_id);
            $valor = $user->nombre1.' '.$user->apellido1;
            return $valor;
        }else{
            return '';
        }           
    }

    /**
     * Modificador de fecha
     */
    public function getCreatedAtAttribute($valor)
    {
        if($valor != null){
            return date("d-m-Y H:i:s", strtotime($valor));
        }else{
            return '';
        }
    }

    /**
     * Modificador de socio
     */
    public function getSocioIdAttribute($valor)
    {
        if($valor != null){
            $socio_id = $valor;
            $socio = Socio::findOrFail($socio_id);
            $valor = $socio->nombre1.' '.$socio->apellido1;
            return $valor;
        }else{
            return '';
        }
    }

    /**
     * registrar en log 
     */
    static public function registrarAccion($accion)
    {
        $log = new LogSistema;
        $log->fecha = date('Y-m-d');
        $log->accion = $accion;
        $log->ip = obtenerIp();
        $log->navegador = obtenerBrowser();
        $log->sistema = obtenerSistemaOperativo();
        $log->usuario_id = auth()->user()->id;  
        $log->correo = auth()->user()->email; 
        $log->save();         
    }
}
