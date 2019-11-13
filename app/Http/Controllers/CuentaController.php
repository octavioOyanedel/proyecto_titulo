<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cuenta;
use App\TipoCuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_cuenta = TipoCuenta::orderBy('nombre','ASC')->get();
        $bancos = Banco::orderBy('nombre','ASC')->get();
        return view('sind1.cuentas.create', compact('tipos_cuenta', 'bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $e = '';
        return redirect()->route('mantenedor_contables', compact('e'))->with('agregar-cuenta','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        $e = '';
        $tipos_cuenta = TipoCuenta::orderBy('nombre','ASC')->get();
        $bancos = Banco::orderBy('nombre','ASC')->get();
        return view('sind1.cuentas.edit', compact('tipos_cuenta','bancos','cuenta','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        $e = '';
        return redirect()->route('mantenedor_contables', compact('e'))->with('editar-cuenta','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        if ($request->ajax()) {
            return Cuenta::destroy($request->id);   
        }  
    }
}
