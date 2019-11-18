<?php

namespace App\Http\Controllers;

use App\GradoAcademico;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarGradoAcademicoRequest;

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
    public function store(IncorporarGradoAcademicoRequest $request)
    {
        GradoAcademico::create($request->all());         
        session(['mensaje' => 'Nivel educacional agregado con éxito.']);
        return redirect()->route('mantenedor_estudios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GradoAcademico  $gradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gradoAcademico = GradoAcademico::findOrFail($id);
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
        $gradoAcademico = GradoAcademico::findOrFail($id);
        return view('sind1.nivel.edit', compact('gradoAcademico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GradoAcademico  $gradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function update(IncorporarGradoAcademicoRequest $request, $id)
    {
        $modificar = GradoAcademico::findOrFail($id);
        $modificar->nombre = $request->nombre;
        $modificar->update();     
        session(['mensaje' => 'Nivel educacional editado con éxito.']);   
        return redirect()->route('mantenedor_estudios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GradoAcademico  $gradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        GradoAcademico::destroy($id);
        session(['mensaje' => 'Nivel educacional eliminado con éxito.']);        
        return redirect()->route('mantenedor_estudios');  
    }
}
