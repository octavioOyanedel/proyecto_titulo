<?php

namespace App\Http\Controllers;

use App\Nacionalidad;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarNacionalidadRequest;
use App\Http\Requests\EditarNacionalidadRequest;

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
        $nacion = Nacionalidad::create($request->all());
        session(['mensaje' => 'Nacionalidad agregada con éxito.']);
        LogSistema::registrarAccion('Nacionalidad agragada: '.$nacion->nombre);
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
    public function update(EditarNacionalidadRequest $request, $id)
    {
        $modificar = Nacionalidad::findOrFail($id);
        $nacionalidad = $modificar->nombre;
        $modificar->nombre = $request->nombre;
        $modificar->update();
        session(['mensaje' => 'Nacionalidad editada con éxito.']);
        LogSistema::registrarAccion('Nacionalidad editada, de: '.$nacionalidad.' a '.$request->nombre);
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
        $eliminada = Nacionalidad::findOrFail($id)->nombre;       
        Nacionalidad::destroy($id);
        session(['mensaje' => 'Nacionalidad eliminada con éxito.']);
        LogSistema::registrarAccion('Nacionalidad eliminada: '.$eliminada); 
        return redirect()->route('mantenedor_socio_nacionalidad');
    }
}
