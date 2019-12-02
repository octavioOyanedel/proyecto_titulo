<?php

namespace App\Http\Controllers;

use App\Sede;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarSedeRequest;
use App\Http\Requests\EditarSedeRequest;

class SedeController extends Controller
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
        return view('sind1.sede.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarSedeRequest $request)
    {
        $sede = Sede::create($request->all());
        session(['mensaje' => 'Sede agregada con éxito.']);
        LogSistema::registrarAccion('Sede agragada: '.convertirArrayAString($sede->toArray()));
        return redirect()->route('mantenedor_socio_sede');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function show(Sede $sede)
    {
        return view('sind1.sede.show', compact('sede'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function edit(Sede $sede)
    {
        return view('sind1.sede.edit', compact('sede'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function update(EditarSedeRequest $request, Sede $sede)
    {
        $modificar = Sede::findOrFail($sede->id);
        $modificar->nombre = $request->nombre;
        $modificar->update();
        session(['mensaje' => 'Sede editada con éxito.']);
        LogSistema::registrarAccion('Sede editada, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($sede->toArray()));
        return redirect()->route('mantenedor_socio_sede');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sede $sede)
    {
        $eliminada_nombre = $sede->nombre;
        $sede = Sede::destroy($sede->id);
        session(['mensaje' => 'Sede eliminada con éxito.']);
        LogSistema::registrarAccion('Área eliminada: '.convertirArrayAString($eliminada->toArray()));         
        return redirect()->route('mantenedor_socio_sede');
    }
}