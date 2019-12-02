<?php

namespace App\Http\Controllers;

use App\Parentesco;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarParentescoRequest;
use App\Http\Requests\EditarParentescoRequest;

class ParentescoController extends Controller
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
        return view('sind1.parentesco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarParentescoRequest $request)
    {
        $parentesco = Parentesco::create($request->all());
        session(['mensaje' => 'Parentesco agregado con éxito.']);
        LogSistema::registrarAccion('parentesco agragado: '.convertirArrayAString($parentesco->toArray()));      
        return redirect()->route('mantenedor_carga_parentesco');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function show(Parentesco $parentesco)
    {
        return view('sind1.parentesco.show', compact('parentesco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function edit(Parentesco $parentesco)
    {
        $parentescos = Parentesco::orderBy('nombre', 'ASC')->get();
        return view('sind1.parentesco.edit', compact('parentesco', 'parentescos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function update(EditarParentescoRequest $request, Parentesco $parentesco)
    {
        $modificar = Parentesco::findOrFail($parentesco->id);
        $modificar->nombre = $request->nombre;
        $modificar->update();
        session(['mensaje' => 'Parentesco editado con éxito.']);
        LogSistema::registrarAccion('parentesco editado, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($parentesco->toArray()));
        return redirect()->route('mantenedor_carga_parentesco');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parentesco $parentesco)
    {
        $eliminada = $parentesco->nombre;        
        Parentesco::destroy($parentesco->id);
        session(['mensaje' => 'Parentesco eliminado con éxito.']);
        LogSistema::registrarAccion('parentesco eliminado: '.convertirArrayAString($eliminada->toArray())); 
        return redirect()->route('mantenedor_carga_parentesco');
    }
}
