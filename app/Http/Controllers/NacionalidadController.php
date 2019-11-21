<?php

namespace App\Http\Controllers;

use App\Nacionalidad;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarNacionalidadRequest;

class NacionalidadController extends Controller
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
        return view('sind1.nacionalidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarNacionalidadRequest $request)
    {
        Nacionalidad::create($request->all());
        session(['mensaje' => 'Nacionalidad agregada con éxito.']);
        return redirect()->route('mantenedor_socio_nacionalidad');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nacionalidad  $nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nacionalidad = Nacionalidad::findOrFail($id);
        return view('sind1.nacionalidad.show', compact('nacionalidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nacionalidad  $nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nacionalidad = Nacionalidad::findOrFail($id);
        return view('sind1.nacionalidad.edit', compact('nacionalidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nacionalidad  $nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function update(IncorporarNacionalidadRequest $request, $id)
    {
        $modificar = Nacionalidad::findOrFail($id);
        $modificar->nombre = $request->nombre;
        $modificar->update();
        session(['mensaje' => 'Nacionalidad editada con éxito.']);
        return redirect()->route('mantenedor_socio_nacionalidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nacionalidad  $nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nacionalidad::destroy($id);
        session(['mensaje' => 'Nacionalidad eliminada con éxito.']);
        return redirect()->route('mantenedor_socio_nacionalidad');
    }
}
