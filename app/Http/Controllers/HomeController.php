<?php

namespace App\Http\Controllers;

use App\Socio;
use App\EstadoSocio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $estados = EstadoSocio::where('id','>',1)->orderBy('nombre','ASC')->get();
        
        $campo = $request->get('buscar_socio');
        $socios = Socio::orderBy('created_at', 'DESC')
        ->rut($campo)
        ->nombre1($campo)
        ->nombre2($campo)
        ->apellido1($campo)
        ->apellido2($campo)
        ->celular($campo)
        ->anexo($campo)
        ->correo($campo)
        ->direccion($campo)
        ->get();
        return view('home', compact('socios','estados'));
    }
}
