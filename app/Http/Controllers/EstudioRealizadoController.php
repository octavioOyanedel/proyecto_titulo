<?php

namespace App\Http\Controllers;

use App\GradoAcademico;
use App\EstudioRealizado;
use App\EstadoGradoAcademico;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
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
        $estudio = EstudioRealizado::findOrFail($id);
        return view('sind1.estudio.edit', compact('estudio', 'grados'));
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
