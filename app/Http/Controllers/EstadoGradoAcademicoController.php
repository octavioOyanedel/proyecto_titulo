<?php

namespace App\Http\Controllers;

use App\EstadoGradoAcademico;
use App\GradoAcademico;
use App\LogSistema;
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
        $estado = EstadoGradoAcademico::create($request->all());
        session(['mensaje' => 'Estado nivel educacional agregado con éxito.']);
        LogSistema::registrarAccion('Estado nivel educacional agragado: '.$estado->nombre);
        return redirect()->route('mantenedor_estudio_estado_nivel');
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

        $estadoGradoAcademico = EstadoGradoAcademico::findOrFail($id);
        return view('sind1.estado_nivel.edit', compact('estadoGradoAcademico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoGradoAcademico  $estadoGradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function update(IncorporarEstadoGradoAcademicoRequest $request, $id)
    {
        $modificar = EstadoGradoAcademico::findOrFail($id);
        $estado = $modificar->nombre;
        $modificar->nombre = $request->nombre;
        $modificar->update();             
        session(['mensaje' => 'Estado nivel educacional editado con éxito.']); 
        LogSistema::registrarAccion('Estado nivel educacional editado, de: '.$estado.' a '.$request->nombre);
        return redirect()->route('mantenedor_estudio_estado_nivel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoGradoAcademico  $estadoGradoAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminada = EstadoGradoAcademico::findOrFail($id)->nombre;
        EstadoGradoAcademico::destroy($id);
        session(['mensaje' => 'Estado nivel educacional eliminado con éxito.']); 
        LogSistema::registrarAccion('Estado nivel educacional eliminado: '.$eliminada);        
        return redirect()->route('mantenedor_estudio_estado_nivel');  
    }
}
