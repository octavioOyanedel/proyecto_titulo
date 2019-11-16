<?php

namespace App\Http\Controllers;

use App\EstadoGradoAcademico;
use App\GradoAcademico;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarEstadoGradoAcademicoRequest;

class EstadoGradoAcademicoController extends Controller
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
        return view('sind1.estado_nivel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarEstadoGradoAcademicoRequest $request)
    {
        EstadoGradoAcademico::create($request->all());
        session(['mensaje' => 'Estado nivel agregado con éxito.']);
        return redirect()->route('mantenedor_estudios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadoGradoAcademico  $estadoGradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoGradoAcademico = EstadoGradoAcademico::findOrFail($id);
        return view('sind1.estado_nivel.show', compact('estadoGradoAcademico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoGradoAcademico  $estadoGradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $e = '';
        $estadoGradoAcademico = EstadoGradoAcademico::findOrFail($id);
        return view('sind1.estado_nivel.edit', compact('estadoGradoAcademico','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoGradoAcademico  $estadoGradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoGradoAcademico $estadoGradoAcademico)
    {
        $e = '';
        return redirect()->route('mantenedor_estudios', compact('e'))->with('editar-estado-nivel-educacional','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoGradoAcademico  $estadoGradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EstadoGradoAcademico::destroy($id);
        session(['mensaje' => 'Estado nivel educacional eliminado con éxito.']);        
        return redirect()->route('mantenedor_estudios');  
    }
}
