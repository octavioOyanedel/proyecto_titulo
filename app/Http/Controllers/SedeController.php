<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Area;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarSedeRequest;

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
        Sede::create($request->all());
        $sedes = Sede::orderBy('nombre', 'ASC')->get();
        $areas = Area::orderBy('sede_id', 'ASC')->get();
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();        
        return redirect()->route('mantenedor_socios', compact('sedes','areas','cargos','estados','nacionalidades'))->with('agregar-sede','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function show(Sede $sede)
    {
        //
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
    public function update(IncorporarSedeRequest $request, Sede $sede)
    {
        $modificar = Sede::findOrFail($sede->id);
        $modificar->nombre = $request->nombre;
        $modificar->update();
        //reenvio
        $sedes = Sede::orderBy('nombre', 'ASC')->get();
        $areas = Area::orderBy('sede_id', 'ASC')->get();
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();        
        return redirect()->route('mantenedor_socios', compact('sedes','areas','cargos','estados','nacionalidades'))->with('editar-sede','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            return Sede::destroy($request->id);   
        }        
    }
}
