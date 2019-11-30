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

class EstudioRealizadoSocioController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstudioRealizadoSocio  $estudioRealizadoSocio
     * @return \Illuminate\Http\Response
     */
    public function show(EstudioRealizadoSocio $estudioRealizadoSocio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstudioRealizadoSocio  $estudioRealizadoSocio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudioRealizadoSocio = EstudioRealizadoSocio::findOrFail($id);
        $estudioRealizado = EstudioRealizado::findOrFail($estudioRealizadoSocio->estudio_realizado_id);
        $socio_id = $estudioRealizadoSocio->socio_id;
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $estados = EstadoGradoAcademico::orderBy('nombre','ASC')->get();       
        $instituciones = GradoAcademicoInstitucion::all();         
        $titulos = GradoAcademicoTitulo::all();              
        return view('sind1.estudio.edit', compact('grados', 'instituciones', 'estados', 'titulos','estudioRealizado','socio_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstudioRealizadoSocio  $estudioRealizadoSocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstudioRealizadoSocio $estudioRealizadoSocio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstudioRealizadoSocio  $estudioRealizadoSocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstudioRealizadoSocio $estudioRealizadoSocio)
    {
        //
    }

}
