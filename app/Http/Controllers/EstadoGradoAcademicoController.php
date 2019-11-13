<?php

namespace App\Http\Controllers;

use App\EstadoGradoAcademico;
use App\GradoAcademico;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $e = '';
        return redirect()->route('mantenedor_estudios', compact('e'))->with('agregar-estado-nivel-educacional','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadoGradoAcademico  $estadoGradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoGradoAcademico $estadoGradoAcademico)
    {
        //
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
    public function destroy(EstadoGradoAcademico $estadoGradoAcademico)
    {
        if ($request->ajax()) {
            return EstadoGradoAcademico::destroy($request->id);   
        }  
    }
}
