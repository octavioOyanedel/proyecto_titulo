<?php

namespace App\Http\Controllers;

use App\Cuenta;
use Illuminate\Http\Request;

class ConciliacionController extends Controller
{
    /**
     * Busca datos conciliacion.
     *
     * @return \Illuminate\Http\Response
     */
    public function conciliacion()
    {
    	$cuentas = Cuenta::all();
        return view('sind1.contables.conciliacion', compact('cuentas'));       
    }    
}
