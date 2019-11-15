<?php

namespace App\Http\Controllers;

use App\GradoAcademico;
use Illuminate\Http\Request;

class GradoAcademicoController extends Controller
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
        return view('sind1.nivel.create');
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
        return redirect()->route('mantenedor_estudios', compact('e'))->with('agregar-nivel-educacional','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GradoAcademico  $gradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function show(GradoAcademico $gradoAcademico)
    {
        return view('sind1.nivel.show', compact('gradoAcademico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GradoAcademico  $gradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $e = '';
        $gradoAcademico = GradoAcademico::findOrFail($id);
        return view('sind1.nivel.edit', compact('gradoAcademico','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GradoAcademico  $gradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradoAcademico $gradoAcademico)
    {
        $e = '';
        return redirect()->route('mantenedor_estudios', compact('e'))->with('editar-nivel-educacional','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GradoAcademico  $gradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradoAcademico $gradoAcademico)
    {
        GradoAcademico::destroy($gradoAcademico->id);
        session(['mensaje' => 'Nivel educacional eliminado con éxito.']);        
        return redirect()->route('mantenedor_estudios');  
    }
}
