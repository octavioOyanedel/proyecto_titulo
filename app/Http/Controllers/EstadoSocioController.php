<?php

namespace App\Http\Controllers;

use App\EstadoSocio;
use Illuminate\Http\Request;

class EstadoSocioController extends Controller
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
        return view('sind1.estado_socio.create');
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
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoSocio $estadoSocio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoSocio $estadoSocio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoSocio $estadoSocio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoSocio  $estadoSocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoSocio $estadoSocio)
    {
        //
    }
}
