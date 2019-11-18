<?php

namespace App\Http\Controllers;

use App\EstadoSocio;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarEstadoSocioRequest;

class EstadoSocioController extends Controller
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
        return view('sind1.estado_socio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarEstadoSocioRequest $request)
    {
        EstadoSocio::create($request->all());
        session(['mensaje' => 'Estado socio agregado con éxito.']); 
        return redirect()->route('mantenedor_socios'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoSocio $estadoSocio)
    {
        return view('sind1.estado_socio.show', compact('estadoSocio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $estadoSocio = EstadoSocio::findOrFail($id);
        return view('sind1.estado_socio.edit', compact('estadoSocio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function update(IncorporarEstadoSocioRequest $request, EstadoSocio $estadoSocio)
    {
        $modificar = EstadoSocio::findOrFail($estadoSocio->id);
        $modificar->nombre = $request->nombre;
        $modificar->update();      
        session(['mensaje' => 'Estado socio editado con éxito.']);    
        return redirect()->route('mantenedor_socios'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoSocio $estadoSocio)
    {
        EstadoSocio::destroy($estadoSocio->id);
        session(['mensaje' => 'Estado socio eliminado con éxito.']);        
        return redirect()->route('mantenedor_socios');   
    }
}
