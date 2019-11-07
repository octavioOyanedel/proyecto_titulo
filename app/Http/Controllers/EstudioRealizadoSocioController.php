<?php

namespace App\Http\Controllers;

use App\EstudioRealizadoSocio;
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
    public function edit(EstudioRealizadoSocio $estudioRealizadoSocio)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstudioRealizadoSocio  $estudioRealizadoSocio
     * @return \Illuminate\Http\Response
     */
    public function agregarEstudio($socio, $estudio)
    {
        $estudio = new EstudioRealizadoSocio;
        $estudio->socio_id = $socio;
        $estudio->estudio_realizado_id = $estudio;
        $estudio->save();
        return redirect()->route('estudios.create',['id'=>$socio])->with('agregar-estudio','');
    }
}
