<?php

namespace App\Http\Controllers;

use App\EstadoSocio;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarEstadoSocioRequest;
use App\Http\Requests\EditarEstadoSocioRequest;

class EstadoSocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
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
        $estado = EstadoSocio::create($request->all());
        session(['mensaje' => 'Estado socio agregado con éxito.']);
        LogSistema::registrarAccion('Estado socio agragado: '.convertirArrayAString($estado->toArray()));
        return redirect()->route('mantenedor_socio_estado');
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
    public function update(EditarEstadoSocioRequest $request, EstadoSocio $estadoSocio)
    {
        $modificar = EstadoSocio::findOrFail($estadoSocio->id);
        $modificar->nombre = $request->nombre;
        $modificar->update();
        session(['mensaje' => 'Estado socio editado con éxito.']);
        LogSistema::registrarAccion('Estado socio editado, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($estadoSocio->toArray()));
        return redirect()->route('mantenedor_socio_estado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoSocio $estadoSocio)
    {
        $eliminada = EstadoSocio::findOrFail($estadoSocio->id);       
        EstadoSocio::destroy($estadoSocio->id);
        session(['mensaje' => 'Estado socio eliminado con éxito.']);
        LogSistema::registrarAccion('Estado socio eliminado: '.convertirArrayAString($eliminada->toArray())); 
        return redirect()->route('mantenedor_socio_estado');
    }
}
