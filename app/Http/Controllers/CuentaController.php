<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cuenta;
use App\TipoCuenta;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarCuentaRequest;

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
        return view('sind1.cuenta.create', compact('tipos_cuenta', 'bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cuenta::create($request->all());
        session(['mensaje' => 'Cuenta agregada con éxito.']);
        return redirect()->route('mantenedor_contables');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        return view('sind1.cuenta.show', compact('cuenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        $tipos_cuenta = TipoCuenta::orderBy('nombre','ASC')->get();
        $bancos = Banco::orderBy('nombre','ASC')->get();
        return view('sind1.cuenta.edit', compact('tipos_cuenta','bancos','cuenta'));
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
        Cuenta::destroy($cuenta->id);
        session(['mensaje' => 'Cuenta eliminada con éxito.']);        
        return redirect()->route('mantenedor_contables'); 
    }
}
