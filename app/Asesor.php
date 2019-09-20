<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    // cambia nombre de tabla
    protected $table = 'asesores';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre','cargo',
    ];
}
