<?php

namespace App\Http\Controllers;

use App\Parentesco;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $e = '';
        return redirect()->route('mantenedor_cargas', compact('e'))->with('agregar-parentesco',''); 
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
        $e = '';
        $parentescos = Parentesco::orderBy('nombre', 'ASC')->get();
        return view('sind1.parentesco.edit', compact('parentesco', 'parentescos','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parentesco $parentesco)
    {
        $e = '';
        return redirect()->route('mantenedor_cargas', compact('e'))->with('editar-parentesco',''); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parentesco $parentesco)
    {
        Parentesco::destroy($parentesco->id);
        session(['mensaje' => 'Parentesco eliminado con éxito.']);        
        return redirect()->route('mantenedor_cargas');  
    }
}
