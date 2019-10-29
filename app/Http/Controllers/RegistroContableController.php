<?php

namespace App\Http\Controllers;

use App\RegistroContable;
use App\Cuenta;
use App\Concepto;
use App\Socio;
use App\Asociado;
use App\TipoRegistroContable;
use App\Banco;
use Illuminate\Http\Request;

class RegistroContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campo = $request->get('buscar_registro');
        $registros = RegistroContable::orderBy('fecha','DESC')
        ->numeroRegistro($campo)
        ->cheque($campo)
        ->get();
        return view('sind1.contables.index', compact('registros'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = Socio::orderBy('apellido1')->get();
        $cuentas = Cuenta::all();
        $conceptos = Concepto::where('id','<>',3)->orderBy('nombre')->get();
        $tipos_registro = TipoRegistroContable::orderBy('nombre')->get();
        $asociados = Asociado::orderBy('concepto')->get();
        return view('sind1.contables.create', compact('tipos_registro','cuentas','conceptos','socios','asociados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegistroContable  $registroContable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registroContable = RegistroContable::findOrFail($id);
        return view('sind1.contables.show', compact('registroContable'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegistroContable  $registroContable
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroContable $registroContable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegistroContable  $registroContable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroContable $registroContable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegistroContable  $registroContable
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroContable $registroContable)
    {
        //
    }
}
