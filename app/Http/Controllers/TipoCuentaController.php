<?php

namespace App\Http\Controllers;

use App\TipoCuenta;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarTipoCuentaRequest;

class TipoCuentaController extends Controller
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
        return view('sind1.tipo_cuenta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarTipoCuentaRequest $request)
    {
        TipoCuenta::create($request->all());
        session(['mensaje' => 'Tipo de cuenta agregada con éxito.']);
        return redirect()->route('mantenedor_contables');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoCuenta = TipoCuenta::findOrFail($id);
        return view('sind1.tipo_cuenta.show', compact('tipoCuenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoCuenta = TipoCuenta::findOrFail($id);
        return view('sind1.tipo_cuenta.edit', compact('tipoCuenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function update(IncorporarTipoCuentaRequest $request, $id)
    {
        $modificar = TipoCuenta::findOrFail($id);
        $modificar->nombre = $request->nombre;
        $modificar->update();             
        session(['mensaje' => 'Tipo cuenta editada con éxito.']);
        return redirect()->route('mantenedor_contables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoCuenta::destroy($id);
        session(['mensaje' => 'Tipo cuenta eliminada con éxito.']);        
        return redirect()->route('mantenedor_contables'); 
    }
}
