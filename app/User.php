<?php

namespace App;

use App\LogSistema;
use App\Rol;
use App\RegistroContable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // cambia nombre de tabla
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre1','nombre2','apellido1','apellido2','email','password','rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
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
     * scope busqueda por correo
     */
    public function scopeEmail($query, $correo)
    {
        if ($correo) {
            return $query->orWhere('email', '=', $correo);
        }
    }

    /**
     * scope busqueda por rol
     */
    public function scopeRolId($query, $id)
    {
        if ($id) {
            return $query->orWhere('rol_id', 'LIKE', "%$id%");
        }
    }

    /**
     * Relación 
     */
    public function LogsSistema()
    {
        return $this->belongsToMany('App\LogSistema');
    }

    /**
     * Relación 
     */
    public function rol()
    {
        return $this->hasOne('App\Rol');
    }   

    /**
     * Relación 
     */
    public function registros_contables()
    {
        return $this->hasMany('App\RegistroContable');
    }

    /**
     * Modificador de rol
     */
    public function getRolIdAttribute($valor)
    {
        if($valor != null){
            $rol_id = $valor;
            $rol = Rol::findOrFail($rol_id);
            $valor = $rol->nombre;
            return $valor;
        }else{
            return '';
        }           
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
     * Obtener ultimo registro creado
     */
    static public function obtenerUltimoUsuarioIngresado()
    {
        return User::orderBy('created_at', 'DESC')->first();
    }
}
