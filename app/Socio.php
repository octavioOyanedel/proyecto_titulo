<?php

namespace App;

use App\Prestamo;
use App\EstudioRealizadoSocio;
use App\EstudioRealizado;
use App\Comuna;
use App\Ciudad;
use App\Sede;
use App\Area;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;
use App\CargaFamiliar;
use App\RegistroContable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre1','nombre2','apellido1','apellido2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id',
    ];

//scope filtro
//***************************************************************************************************************
    /**
     * scope busqueda fecha de nacimiento
     */
    public function scopeFechaNacimiento($query, $fecha_ini, $fecha_fin)
    {
        if($fecha_ini != null && $fecha_fin != null){
            return $query->whereBetween('fecha_nac', [date($fecha_ini),date($fecha_fin)]);
        }
        if($fecha_ini != null && $fecha_fin === null){
             return $query->where('fecha_nac','>=',$fecha_ini);
        }
        if($fecha_ini === null && $fecha_fin != null){
             return $query->where('fecha_nac','<=',$fecha_fin);
        }
    }

    /**
     * scope busqueda fecha PUCV
     */
    public function scopeFechaIngresoPucv($query, $fecha_ini, $fecha_fin)
    {
        if($fecha_ini != null && $fecha_fin != null){
            return $query->whereBetween('fecha_pucv', [date($fecha_ini),date($fecha_fin)]);
        }
        if($fecha_ini != null && $fecha_fin === null){
             return $query->where('fecha_pucv','>=',$fecha_ini);
        }
        if($fecha_ini === null && $fecha_fin != null){
             return $query->where('fecha_pucv','<=',$fecha_fin);
        }
    }
    /**
     * scope busqueda fecha sind1
     */
    public function scopeFechaIngresoSind1($query, $fecha_ini, $fecha_fin)
    {
        if($fecha_ini != null && $fecha_fin != null){
            return $query->whereBetween('fecha_sind1', [date($fecha_ini),date($fecha_fin)]);
        }
        if($fecha_ini != null && $fecha_fin === null){
             return $query->where('fecha_sind1','>=',$fecha_ini);
        }
        if($fecha_ini === null && $fecha_fin != null){
             return $query->where('fecha_sind1','<=',$fecha_fin);
        }
    }

    /**
     * scope busqueda comuna
     */
    public function scopeComunaId($query, $comuna_id)
    {
        if($comuna_id != null){
            return $query->where('comuna_id','=',$comuna_id);
        }
    }

    /**
     * scope busqueda ciudad
     */
    public function scopeCiudadId($query, $ciudad_id)
    {
        if($ciudad_id != null && $ciudad_id != 'Seleccione...'){
            return $query->where('ciudad_id','=',$ciudad_id);
        }
    }

    /**
     * scope busqueda sede
     */
    public function scopeSedeId($query, $sede_id)
    {
        if($sede_id != null){
            return $query->where('sede_id','=',$sede_id);
        }
    }

    /**
     * scope busqueda area
     */
    public function scopeAreaId($query, $area_id)
    {
        if($area_id != null && $area_id != 'Seleccione...'){
            return $query->where('area_id','=',$area_id);
        }
    }

    /**
     * scope busqueda sede
     */
    public function scopeDireccion($query, $direccion)
    {
        if($direccion != null){
            return $query->where('direccion','LIKE',"%$direccion%");
        }
    }


    /**
     * scope busqueda cargo
     */
    public function scopeCargoId($query, $cargo_id)
    {
        if($cargo_id != null){
            return $query->where('cargo_id','=',$cargo_id);
        }
    }

    /**
     * scope busqueda estado
     */
    public function scopeEstadoSocioId($query, $estado_socio_id)
    {
        if($estado_socio_id != null){
            return $query->where('estado_socio_id','=',$estado_socio_id);
        }
    }

    /**
     * scope busqueda nacionalidad
     */
    public function scopeNacionalidadId($query, $nacionalidad_id)
    {
        if($nacionalidad_id != null){
            return $query->where('nacionalidad_id','=',$nacionalidad_id);
        }
    }

    /**
     * scope busqueda por anexo
     */
    public function scopeGenero($query, $genero)
    {
        if ($genero != null) {
            return $query->where('genero', '=', $genero);
        }
    }

    /**
     * scope busqueda por rut
     */
    public function scopeRutFiltro($query, $rut)
    {
        if ($rut) {
            return $query->where('rut', '=', $rut);
        }
    }
//***************************************************************************************************************
    /**
     * scope busqueda por rut
     */
    public function scopeRut($query, $rut)
    {
        if ($rut) {
            return $query->orWhere('rut', '=', $rut);
        }
    }

    /**
     * scope busqueda fecha
     */
    public function scopeFechaUnica($query, $fecha)
    {
        $fecha_formarteada = date("Y-m-d", strtotime($fecha));
        if($fecha != null){
            return $query->orWhere('fecha_sind1','=',$fecha_formarteada);
        }
    }

    /**
     * scope busqueda por nombre 1
     */
    public function scopeNombre1($query, $nombre1)
    {
        if ($nombre1) {
            return $query->orWhere('nombre1', 'LIKE', "%$nombre1%");
        }
    }

    /**
     * scope busqueda por nombre 2
     */
    public function scopeNombre2($query, $nombre2)
    {
        if ($nombre2) {
            return $query->orWhere('nombre2', 'LIKE', "%$nombre2%");
        }
    }
    /**
     * scope busqueda por apellido 1
     */
    public function scopeApellido1($query, $apellido1)
    {
        if ($apellido1) {
            return $query->orWhere('apellido1', 'LIKE', "%$apellido1%");
        }
    }

    /**
     * scope busqueda por apellido 2
     */
    public function scopeApellido2($query, $apellido2)
    {
        if ($apellido2) {
            return $query->orWhere('apellido2', 'LIKE', "%$apellido2%");
        }
    }

    /**
     * scope busqueda por celular
     */
    public function scopeCelular($query, $celular)
    {
        if ($celular) {
            return $query->orWhere('celular', '=', $celular);
        }
    }

    /**
     * scope busqueda por anexo
     */
    public function scopeAnexo($query, $anexo)
    {
        if ($anexo) {
            return $query->orWhere('anexo', '=', $anexo);
        }
    }

    /**
     * scope busqueda por anexo
     */
    public function scopeCorreo($query, $correo)
    {
        if ($correo) {
            return $query->orWhere('correo', '=', $correo);
        }
    }

    /**
     * scope busqueda por anexo
     */
    public function scopeNumeroSocio($query, $numero)
    {
        if ($numero) {
            return $query->orWhere('numero_socio', '=', $numero);
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
     * scope busqueda por area
     */
    public function scopeArea($query, $area)
    {
        if ($area) {
            $area_id = Area::obtenerAreaPorNombre($area);
            if($area_id != null){
                return $query->orWhere('area_id', '=', $area_id->id);
            }
        }
    }

    /**
     * scope busqueda por cargo
     */
    public function scopeCargo($query, $cargo)
    {
        if ($cargo) {
            $cargo_id = cargo::obtenerCargoPorNombre($cargo);
            if($cargo_id != null){
                return $query->orWhere('cargo_id', '=', $cargo_id->id);
            }
        }
    }

    /**
     * Modificador de comuna
     */
    public function getComunaIdAttribute($valor)
    {
        if($valor != null){
            $comuna_id = $valor;
            $comuna = Comuna::findOrFail($comuna_id);
            $valor = $comuna->nombre;
            return $valor;
        }else{
            return '';
        }

    }

    /**
     * Modificador de ciudad
     */
    public function getCiudadIdAttribute($valor)
    {
        if($valor != null){
            $ciudad_id = $valor;
            $ciudad = Ciudad::findOrFail($ciudad_id);
            $valor = $ciudad->nombre;
            return $valor;
        }else{
            return '';
        }
    }

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
     * Modificador de areas
     */
    public function getAreaIdAttribute($valor)
    {
        if($valor != null){
            $area_id = $valor;
            $area = Area::findOrFail($area_id);
            $valor = $area->nombre;
            return $valor;
        }else{
            return '';
        }

    }

    /**
     * Modificador de cargos
     */
    public function getCargoIdAttribute($valor)
    {
        if($valor != null){
            $cargo_id = $valor;
            $cargo = Cargo::findOrFail($cargo_id);
            $valor = $cargo->nombre;
            return $valor;
        }else{
            return '';
        }
    }
    /**
     * Modificador de estado socio
     */
    public function getEstadoSocioIdAttribute($valor)
    {
        if($valor != null){
            $estado_id = $valor;
            $estado = EstadoSocio::findOrFail($estado_id);
            $valor = $estado->nombre;
            return $valor;
        }else{
            return '';
        }
    }

    /**
     * Modificador de nacionalidad
     */
    public function getNacionalidadIdAttribute($valor)
    {
        if($valor != null){
            $nacionalidad_id = $valor;
            $nacionalidad = Nacionalidad::findOrFail($nacionalidad_id);
            $valor = $nacionalidad->nombre;
            return $valor;
        }else{
            return '';
        }
    }

    /**
     * Modificador de rut
     */
    public function getRutAttribute($valor)
    {
        if($valor != null){
            return formatoRut($valor);
        }else{
            return '';
        }
    }

    /**
     * Modificador de fecha de nacimiento
     */
    public function getFechaNacAttribute($valor)
    {
        if($valor != null){
            return formatoFecha($valor);
        }else{
            return '';
        }
    }

    /**
     * Modificador de fecha pucv
     */
    public function getFechaPucvAttribute($valor)
    {
        if($valor != null){
            return formatoFecha($valor);
        }else{
            return '';
        }
    }

    /**
     * Modificador de fecha sind1
     */
    public function getFechaSind1Attribute($valor)
    {
        if($valor != null){
            return formatoFecha($valor);
        }else{
            return '';
        }
    }

    /**
     * Relación
     */
    public function prestamos()
    {
        return $this->hasMany('App\Prestamo');
    }

    /**
     * Relación
     */
    public function estudios_realizados_socios()
    {
        return $this->hasMany('App\EstudioRealizadoSocio');
    }

    /**
     * Relación
     */
    public function estudios_realizados()
    {
        return $this->hasManyThrough('App\EstudioRealizado', 'App\EstudioRealizadoSocio');
    }

    /**
     * Relación
     */
    public function comuna()
    {
        return $this->hasOne('App\Comuna');
    }

    /**
     * Relación
     */
    public function ciudad()
    {
        return $this->hasOne('App\Ciudad');
    }

    /**
     * Relación
     */
    public function sede()
    {
        return $this->hasOne('App\Sede');
    }

    /**
     * Relación
     */
    public function area()
    {
        return $this->hasOne('App\Area');
    }

    /**
     * Relación
     */
    public function cargo()
    {
        return $this->hasOne('App\Cargo');
    }

    /**
     * Relación
     */
    public function estado_socio()
    {
        return $this->hasOne('App\EstadoSocio');
    }

    /**
     * Relación
     */
    public function nacionalidad()
    {
        return $this->hasOne('App\Nacionalidad');
    }

    /**
     * Relación
     */
    public function cargas_familiares()
    {
        return $this->hasMany('App\CargaFamiliar');
    }

    /**
     * Relación
     */
    public function registros_contables()
    {
        return $this->belongsToMany('App\RegistroContable');
    }

    /**
     * Obtener ultimo registro creado
     */
    static public function obtenerUltimoSocioIngresado()
    {
        return Socio::orderBy('created_at', 'DESC')->first();
    }

    /**
     * Obtener ultimo registro creado
     */
    static public function obtenerSocioPorRut($rut)
    {
        return Socio::where('rut','=',$rut)->first();
    }

    /**
     * mutator nombre
     */
    public function setNombre1Attribute($value)
    {
        $this->attributes['nombre1'] = formatoNombres($value);
    }

    /**
     * mutator nombre
     */
    public function setNombre2Attribute($value)
    {
        $this->attributes['nombre2'] = formatoNombres($value);
    }

    /**
     * mutator nombre
     */
    public function setApellido1Attribute($value)
    {
        $this->attributes['apellido1'] = formatoNombres($value);
    }

    /**
     * mutator nombre
     */
    public function setApellido2Attribute($value)
    {
        $this->attributes['apellido2'] = formatoNombres($value);
    }

    /**
     * Contar incorporaciones por mes
     */
    public function obtenerVinculadosPorMes($mes)
    {
        $fecha_ini = date('Y').'-'.$mes.'-01';
        $fecha_fin = date('Y').'-'.$mes.'-'.obtenerDiasPorMes($mes);
        return Socio::whereBetween('fecha_sind1', [date($fecha_ini),date($fecha_fin)])->count();
    }

    /**
     * Contar desvinculaciones por mes
     */
    public function obtenDesvinculadosPorMes($mes)
    {
        $fecha_ini = date('Y').'-'.$mes.'-01';
        $fecha_fin = date('Y').'-'.$mes.'-'.obtenerDiasPorMes($mes);
        return Socio::onlyTrashed()->whereBetween('deleted_at', [date($fecha_ini),date($fecha_fin)])->count();
    }

}
