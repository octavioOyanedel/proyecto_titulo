<?php

namespace App\Http\Controllers;

use App\Concepto;
use App\TipoRegistroContable;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarConceptoRequest;

class ConceptoController extends Controller
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
        $tipos_registro = TipoRegistroContable::orderBy('nombre')->get();
        return view('sind1.concepto.create', compact('tipos_registro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarConceptoRequest $request)
    {
        Concepto::create($request->all());
        session(['mensaje' => 'Concepto agregado con éxito.']);
        return redirect()->route('mantenedor_contable_concepto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function show(Concepto $concepto)
    {
        return view('sind1.concepto.show', compact('concepto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function edit(Concepto $concepto)
    {
        $tipos_registro = TipoRegistroContable::orderBy('nombre')->get();        
        return view('sind1.concepto.edit', compact('concepto','tipos_registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function update(IncorporarConceptoRequest $request, Concepto $concepto)
    {
        $modificar = Concepto::findOrFail($concepto->id);
        $modificar->nombre = $request->nombre;
        $modificar->nombre = $request->nombre;
        $modificar->update();             
        session(['mensaje' => 'Concepto editado con éxito.']);
        return redirect()->route('mantenedor_contable_concepto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concepto $concepto)
    {
        Concepto::destroy($concepto->id);
        session(['mensaje' => 'Concepto eliminado con éxito.']);        
        return redirect()->route('mantenedor_contable_concepto'); 
    }
}
