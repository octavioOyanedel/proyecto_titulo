<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Area;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;
use App\FormaPago;
use App\Cuenta;
use App\TipoCuenta;
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
    public function socioSede()
    {
    	$sedes = Sede::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.socio.sede', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioArea()
    {
        $areas = Area::orderBy('sede_id', 'ASC')->paginate(15);
        return view('sind1.mantenedores.socio.area', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioCargo()
    {
        $cargos = Cargo::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.socio.cargo', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioEstado()
    {
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.socio.estado', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioNacionalidad()
    {
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.socio.nacionalidad', compact('nacionalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargaParentesco()
    {
        $parentescos = Parentesco::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.carga.parentesco', compact('parentescos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudioNivel()
    {
        $grados = GradoAcademico::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.estudio.nivel', compact('grados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudioInstitucion()
    {
        $instituciones = Institucion::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.estudio.institucion', compact('instituciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudioEstadoNivel()
    {
        $estados = EstadoGradoAcademico::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.estudio.estado_nivel', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudioTitulo()
    {
        $titulos = Titulo::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.estudio.titulo', compact('titulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prestamoFormaPago()
    {
        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.prestamo.forma_pago', compact('formas_pago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableCuenta()
    {
        $cuentas = Cuenta::orderBy('numero', 'ASC')->paginate(15);
        return view('sind1.mantenedores.contable.cuenta', compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableBanco()
    {
        $bancos = Banco::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.contable.banco', compact('bancos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableConcepto()
    {
        $conceptos = Concepto::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.contable.concepto', compact('conceptos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableTipoCuenta()
    {
        $tipos_cuenta = TipoCuenta::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.contable.tipo_cuenta', compact('tipos_cuenta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableAsociado()
    {
        $asociados = Asociado::orderBy('nombre', 'ASC')->paginate(15);
        return view('sind1.mantenedores.contable.asociado', compact('asociados'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cerrarAlerta(Request $request)
    {
        if($request->ajax()){
            session()->forget('mensaje');
        }
    }

}
