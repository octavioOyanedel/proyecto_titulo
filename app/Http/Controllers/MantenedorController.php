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
use App\User;
use App\Rol;
use App\Banco;
use App\Parentesco;
use App\GradoAcademico;
use App\Institucion;
use App\EstadoGradoAcademico;
use App\Titulo;
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
        $e = '';
    	$sedes = Sede::orderBy('nombre', 'ASC')->get();
        $areas = Area::orderBy('sede_id', 'ASC')->get();
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();
        return view('sind1.mantenedores.socios', compact('sedes','areas','cargos','estados','nacionalidades','e'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prestamos()
    {
        $e = '';
    	$formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        return view('sind1.mantenedores.prestamos', compact('formas_pago','e'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contables()
    {
        $e = '';
        $cuentas = Cuenta::orderBy('numero', 'ASC')->get();
        $conceptos = Concepto::orderBy('nombre', 'ASC')->get();
        $asociados = Asociado::orderBy('nombre', 'ASC')->get();
        $bancos = Banco::orderBy('nombre', 'ASC')->get();
        return view('sind1.mantenedores.contables', compact('cuentas','conceptos','asociados','bancos','e'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargas()
    {
        $e = '';
        $parentescos = Parentesco::orderBy('nombre', 'ASC')->get();
        return view('sind1.mantenedores.cargas', compact('parentescos','e'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudios()
    {
        $e = '';
        $grados = GradoAcademico::orderBy('nombre', 'ASC')->get();
        $instituciones = Institucion::orderBy('nombre', 'ASC')->get();
        $estados = EstadoGradoAcademico::orderBy('nombre', 'ASC')->get();
        $titulos = Titulo::orderBy('nombre', 'ASC')->get();
        return view('sind1.mantenedores.estudios', compact('grados','instituciones','estados','titulos','e'));
    }

}
