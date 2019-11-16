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
        return redirect()->route('mantenedor_contables');
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
        return view('sind1.concepto.edit', compact('concepto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concepto $concepto)
    {
        $e = '';
        return redirect()->route('mantenedor_contables', compact('e'))->with('editar-concepto','');
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
        return redirect()->route('mantenedor_contables'); 
    }
}
