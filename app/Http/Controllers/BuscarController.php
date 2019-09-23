<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Sede;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;

use Illuminate\Http\Request;

class BuscarController extends Controller
{
    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function busquedaAvanzada(Request $request)
    {
    	$comunas = Comuna::orderBy('nombre', 'ASC')->get();
        $sedes = Sede::orderBy('nombre', 'ASC')->get();
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();
        return view('sind1.socios.busqueda', compact('cargos', 'estados', 'nacionalidades', 'comunas', 'sedes'));
    }
}
