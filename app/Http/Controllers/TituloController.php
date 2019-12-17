<?php

namespace App\Http\Controllers;

use App\Titulo;
use App\GradoAcademico;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarTituloRequest;
use App\Http\Requests\EditarTituloRequest;

class TituloController extends Controller
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
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        return view('sind1.titulo.create', compact('grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarTituloRequest $request)
    {
        $titulo = Titulo::create($request->all());
        session(['mensaje' => 'Título agregado con éxito.']);
        LogSistema::registrarAccion('Título agragado: '.convertirArrayAString($titulo->toArray()));
        return redirect()->route('mantenedor_estudio_titulo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function show(Titulo $titulo)
    {
        return view('sind1.titulo.show', compact('titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $titulo = Titulo::findOrFail($id);
        return view('sind1.titulo.edit', compact('titulo','grados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function update(EditarTituloRequest $request, Titulo $titulo)
    {
        $modificar = Titulo::findOrFail($titulo->id);
        $modificar->nombre = $request->nombre;
        $modificar->update();             
        session(['mensaje' => 'Título editado con éxito.']);
        LogSistema::registrarAccion('Título editado, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($titulo->toArray()));
        return redirect()->route('mantenedor_estudio_titulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulo $titulo)
    {
        $eliminada = Titulo::findOrFail($titulo->id); 
        Titulo::destroy($titulo->id);
        session(['mensaje' => 'Título eliminado con éxito.']);
        LogSistema::registrarAccion('Título eliminado: '.convertirArrayAString($eliminada->toArray()));     
        return redirect()->route('mantenedor_estudio_titulo');  
    }
}
