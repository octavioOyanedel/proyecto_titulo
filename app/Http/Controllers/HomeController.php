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
        $rut = $request->get('search');
        $nombre1 = $request->get('search');
        $nombre2 = $request->get('search');
        $apellido1 = $request->get('search');
        $apellido2 = $request->get('search');
        $celular = $request->get('search');
        $anexo = $request->get('search');
        $correo = $request->get('search');
        $direccion = $request->get('search');
        $socios = Socio::orderBy('fecha_sind1', 'DESC')
        ->rut($rut)
        ->nombre1($nombre1)
        ->nombre2($nombre2)
        ->apellido1($apellido1)
        ->apellido2($apellido2)
        ->celular($celular)
        ->anexo($anexo)
        ->correo($correo)
        ->direccion($direccion)
        ->get();
        return view('home', compact('socios','estados'));
    }
}
