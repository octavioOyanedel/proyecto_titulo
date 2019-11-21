<?php

namespace App\Http\Controllers;

use App\Asociado;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarAsociadoRequest;

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
        Asociado::create($request->all());         
        session(['mensaje' => 'Asociado agregado con éxito.']);        
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
    public function update(IncorporarAsociadoRequest $request, Asociado $asociado)
    {
        $modificar = Asociado::findOrFail($asociado->id);
        $modificar->concepto = $request->concepto;
        $modificar->nombre = $request->nombre;
        $modificar->update();             
        session(['mensaje' => 'Asociado editado con éxito.']);
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
        Asociado::destroy($asociado->id);
        session(['mensaje' => 'Asociado eliminado con éxito.']);        
        return redirect()->route('mantenedor_contable_asociado'); 
    }
}
