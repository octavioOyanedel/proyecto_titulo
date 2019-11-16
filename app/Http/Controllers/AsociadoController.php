<?php

namespace App\Http\Controllers;

use App\Asociado;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarAsociadoRequest;

class AsociadoController extends Controller
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
        return view('sind1.asociado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarAsociadoRequest $request)
    {
        Asociado::create($request->all());         
        session(['mensaje' => 'Asociado agregado con éxito.']);        
        return redirect()->route('mantenedor_contables');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asociado  $asociado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asociado = Asociado::findOrfail($id);
        return view('sind1.asociado.show', compact('asociado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asociado  $asociado
     * @return \Illuminate\Http\Response
     */
    public function edit(Asociado $asociado)
    {
        $e = '';
        return view('sind1.asociado.edit', compact('asociado','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asociado  $asociado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asociado $asociado)
    {
        $e = '';
        return redirect()->route('mantenedor_contables', compact('e'))->with('editar-asociado','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asociado  $asociado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asociado $asociado)
    {
        Asociado::destroy($asociado->id);
        session(['mensaje' => 'Asociado eliminado con éxito.']);        
        return redirect()->route('mantenedor_contables'); 
    }
}
