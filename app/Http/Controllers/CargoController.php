<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarCargoRequest;

class CargoController extends Controller
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
        Cargo::create($request->all());
        session(['mensaje' => 'Cargo agregado con éxito.']);     
        return redirect()->route('mantenedor_socios'); 
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
        $e = '';
        return view('sind1.cargo.edit', compact('cargo','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(IncorporarCargoRequest $request, Cargo $cargo)
    {
        $e = '';
        $modificar = Cargo::findOrFail($cargo->id);
        $modificar->nombre = $request->nombre;
        $modificar->update();
        return redirect()->route('mantenedor_socios', compact('e'))->with('editar-cargo',''); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        Cargo::destroy($cargo->id);
        session(['mensaje' => 'Cargo eliminado con éxito.']);        
        return redirect()->route('mantenedor_socios'); 
    }
}
