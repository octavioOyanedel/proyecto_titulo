<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Area;
use Illuminate\Http\Request;

class MantenedorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socios()
    {
    	$sedes = Sede::orderBy('nombre', 'ASC')->get();
    	$areas = Area::orderBy('sede_id', 'ASC')->get();
        return view('sind1.mantenedores.socios.mantenedor', compact('sedes','areas'));
    }
}
