<?php

namespace App\Http\Controllers;

use App\GradoAcademico;
use App\EstudioRealizado;
use App\EstudioRealizadoSocio;
use App\EstadoGradoAcademico;
use App\GradoAcademicoInstitucion;
use App\GradoAcademicoTitulo;
use App\Titulo;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarEstudioRealizadoRequest;

class EstudioRealizadoController extends Controller
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
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $estados = EstadoGradoAcademico::orderBy('nombre','ASC')->get();
        return view('sind1.estudio.create', compact('grados','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarEstudioRealizadoRequest $request)
    {
        EstudioRealizado::create($request->all());
        $estudio = EstudioRealizado::obtenerUltimoEstudioIngresado();
        //almacenar estudio socio en tabla pivote
        $estudio_socio = new EstudioRealizadoSocio;
        $estudio_socio->socio_id = $request->socio_id;
        $estudio_socio->estudio_realizado_id = $estudio->id;
        $estudio_socio->save();
        return redirect()->route('estudios.create',['id'=>$request->input('socio_id')])->with('agregar-estudio','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function show(EstudioRealizado $estudioRealizado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $estados = EstadoGradoAcademico::orderBy('nombre','ASC')->get();
        $instituciones = GradoAcademicoInstitucion::all();
        $titulos = GradoAcademicoTitulo::all();
        $estudio = EstudioRealizado::findOrFail($id);
        return view('sind1.estudio.edit', compact('grados', 'instituciones', 'estados', 'titulos', 'estudio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstudioRealizado $estudioRealizado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstudioRealizado $estudioRealizado)
    {
        //
    }
}
