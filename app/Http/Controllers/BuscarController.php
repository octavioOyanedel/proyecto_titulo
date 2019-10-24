<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Sede;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;
use App\FormaPago;
use App\Cuenta;
use App\Concepto;
use App\Socio;
use App\Asociado;
use App\TipoRegistroContable;
use App\User;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroSocios(Request $request)
    {
    	$comunas = Comuna::orderBy('nombre', 'ASC')->get();
        $sedes = Sede::orderBy('nombre', 'ASC')->get();
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();
        return view('sind1.socios.busqueda', compact('cargos', 'estados', 'nacionalidades', 'comunas', 'sedes'));
    }

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroPrestamos(Request $request)
    {
        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        return view('sind1.prestamos.busqueda', compact('formas_pago'));
    }

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroContables(Request $request)
    {
        $socios = Socio::orderBy('apellido1')->get();
        $cuentas = Cuenta::all();
        $conceptos = Concepto::where('id','<>',3)->orderBy('nombre')->get();
        $tipos_registro = TipoRegistroContable::orderBy('nombre')->get();
        $asociados = Asociado::orderBy('concepto')->get();
        return view('sind1.contables.busqueda', compact('tipos_registro','cuentas','conceptos','socios','asociados'));
    }

    public function filtroHistorial(Request $request)
    {
        $usuarios = User::orderBy('nombre1', 'ASC')->get();
        return view('sind1.historial.busqueda', compact('usuarios'));
    }
}
