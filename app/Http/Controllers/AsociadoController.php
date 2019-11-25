<?php

namespace App\Http\Controllers;

use App\Asociado;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarAsociadoRequest;
use App\Http\Requests\EditarAsociadoRequest;

class AsociadoController extends Controller
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
        return view('sind1.asociado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarAsociadoRequest $request)
    {
        $asociado = Asociado::create($request->all());         
        session(['mensaje' => 'Asociado agregado con éxito.']);
        LogSistema::registrarAccion('Asociado agragado: '.$asociado->concepto.' - '.$asociado->nombre);        
        return redirect()->route('mantenedor_contable_asociado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asociado  $asociado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asociado = Asociado::findOrfail($id);
        return view('sind1.asociado.show', compact('asociado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asociado  $asociado
     * @return \Illuminate\Http\Response
     */
    public function edit(Asociado $asociado)
    {
        return view('sind1.asociado.edit', compact('asociado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asociado  $asociado
     * @return \Illuminate\Http\Response
     */
    public function update(EditarAsociadoRequest $request, Asociado $asociado)
    {
        $modificar = Asociado::findOrFail($asociado->id);
        $modificar->concepto = $request->concepto;
        $modificar->nombre = $request->nombre;
        $modificar->update();             
        session(['mensaje' => 'Asociado editado con éxito.']);
        LogSistema::registrarAccion('Asociado editado, de: '.$asociado->concepto.' '.$asociado->nombre.' a '.$request->concepto.' '.$request->nombre);
        return redirect()->route('mantenedor_contable_asociado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asociado  $asociado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asociado $asociado)
    {
        $eliminada_concepto = $asociado->concepto;
        $eliminada_nombre = $asociado->nombre;
        Asociado::destroy($asociado->id);
        session(['mensaje' => 'Asociado eliminado con éxito.']); 
        LogSistema::registrarAccion('Asociado eliminado: '.$eliminada_concepto.' '.$eliminada_nombre);        
        return redirect()->route('mantenedor_contable_asociado'); 
    }
}
