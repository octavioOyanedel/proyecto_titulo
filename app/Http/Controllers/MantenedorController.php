<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Area;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;
use App\FormaPago;
use App\Cuenta;
use App\Concepto;
use App\Asociado;
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
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();
        return view('sind1.mantenedores.socios', compact('sedes','areas','cargos','estados','nacionalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prestamos()
    {
    	$formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        return view('sind1.mantenedores.prestamos', compact('formas_pago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contables()
    {
        $cuentas = Cuenta::orderBy('numero', 'ASC')->get();
        $conceptos = Concepto::orderBy('nombre', 'ASC')->get();
        $asociados = Asociado::orderBy('nombre', 'ASC')->get();
        return view('sind1.mantenedores.contables', compact('cuentas','conceptos','asociados'));
    }

}
