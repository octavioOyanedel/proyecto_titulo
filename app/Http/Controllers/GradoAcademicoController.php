<?php

namespace App\Http\Controllers;

use App\GradoAcademico;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarGradoAcademicoRequest;
use App\Http\Requests\EditarNivelRequest;

class GradoAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
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
        $nivel = GradoAcademico::create($request->all());         
        session(['mensaje' => 'Nivel educacional agregado con éxito.']);
        LogSistema::registrarAccion('Nivel educacional agragado: '.convertirArrayAString($nivel->toArray()));
        return redirect()->route('mantenedor_estudio_nivel');
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
    public function update(EditarNivelRequest $request, $id)
    {
        $modificar = GradoAcademico::findOrFail($id);
        $nivel = GradoAcademico::findOrFail($id);
        $modificar->nombre = $request->nombre;
        $modificar->update();     
        session(['mensaje' => 'Nivel educacional editado con éxito.']);
        LogSistema::registrarAccion('Nivel educacional editado, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($nivel->toArray()));
        return redirect()->route('mantenedor_estudio_nivel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GradoAcademico  $gradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminada = GradoAcademico::findOrFail($id);
        GradoAcademico::destroy($id);
        session(['mensaje' => 'Nivel educacional eliminado con éxito.']);  
        LogSistema::registrarAccion('Nivel educacional eliminado: '.convertirArrayAString($eliminada->toArray()));       
        return redirect()->route('mantenedor_estudio_nivel');  
    }
}
