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
     * Relación 
     */
    public function LogsSistema()
    {
        return $this->hasMany('App\LogSistema');
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
        $rol_id = $valor;
        $rol = Rol::findOrFail($rol_id);
        $valor = $rol->nombre;
        return $valor;
    }
}
