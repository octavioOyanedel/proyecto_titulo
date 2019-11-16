<?php

namespace App\Http\Controllers;

use App\Banco;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarBancoRequest;

class BancoController extends Controller
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
        return view('sind1.banco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarBancoRequest $request)
    {
        Banco::create($request->all());
        session(['mensaje' => 'Banco agregado con éxito.']);
        return redirect()->route('mantenedor_contables');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show(Banco $banco)
    {
        return view('sind1.banco.show', compact('banco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function edit(Banco $banco)
    {
        $e = '';
        return view('sind1.banco.edit', compact('banco','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banco $banco)
    {
        $e = '';
        return redirect()->route('mantenedor_contables', compact('e'))->with('editar-banco','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banco $banco)
    {
        Banco::destroy($banco->id);
        session(['mensaje' => 'Banco eliminado con éxito.']);        
        return redirect()->route('mantenedor_contables'); 
    }
}
