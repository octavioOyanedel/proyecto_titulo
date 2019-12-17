<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarCargoRequest;
use App\Http\Requests\EditarCargoRequest;

class CargoController extends Controller
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
        return view('sind1.cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarCargoRequest $request)
    {
        $cargo = Cargo::create($request->all());
        session(['mensaje' => 'Cargo agregado con éxito.']);
        LogSistema::registrarAccion('Cargo agragada: '.convertirArrayAString($cargo->toArray()));
        return redirect()->route('mantenedor_socio_cargo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        return view('sind1.cargo.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return view('sind1.cargo.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(EditarCargoRequest $request, Cargo $cargo)
    {
        $modificar = Cargo::findOrFail($cargo->id);
        $modificar->nombre = $request->nombre;
        $modificar->update();
        session(['mensaje' => 'Cargo editado con éxito.']);
        LogSistema::registrarAccion('Cargo editada, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($cargo->toArray()));
        return redirect()->route('mantenedor_socio_cargo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $eliminada = Cargo::findOrFail($cargo->id);        
        Cargo::destroy($cargo->id);
        session(['mensaje' => 'Cargo eliminado con éxito.']);
        LogSistema::registrarAccion('Área eliminada: '.convertirArrayAString($eliminada->toArray())); 
        return redirect()->route('mantenedor_socio_cargo');
    }
}
