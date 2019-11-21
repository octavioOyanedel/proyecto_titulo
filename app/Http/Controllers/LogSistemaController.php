<?php

namespace App\Http\Controllers;

use App\LogSistema;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\FiltrarHistorialRequest; 

class LogSistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = LogSistema::orderBy('created_at', 'DESC')->paginate(15);
        return view('sind1.historial.index', compact('registros'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogSistema  $logSistema
     * @return \Illuminate\Http\Response
     */
    public function show(LogSistema $logSistema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogSistema  $logSistema
     * @return \Illuminate\Http\Response
     */
    public function edit(LogSistema $logSistema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogSistema  $logSistema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogSistema $logSistema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogSistema  $logSistema
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogSistema $logSistema)
    {
        //
    }

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroHistorialForm(Request $request)
    {
        $usuarios = User::orderBy('nombre1', 'ASC')->get();
        return view('sind1.historial.busqueda', compact('usuarios'));

    }

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroHistorial(FiltrarHistorialRequest $request)
    {
        $registros = LogSistema::orderBy('created_at', 'DESC')
        ->fecha($request->fecha_ini, $request->fecha_fin)
        ->usuarioId($request->usuario_id)        
        ->paginate(15);
        return view('sind1.historial.index', compact('registros'));

    }
}
