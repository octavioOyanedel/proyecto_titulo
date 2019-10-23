<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use Illuminate\Http\Request;

class UsuarioController extends Controller
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
     * @param  \App\user  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(user $usuario)
    {
        return view('sind1.usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(user $usuario)
    {
    	$roles = Rol::orderBy('nombre','ASC')->get();
        return view('sind1.usuario.edit', compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $usuario
     * @return \Illuminate\Http\Response
     */
    public function editPassword(user $usuario)
    {
        return view('sind1.usuario.password', compact('usuario'));
    }
}

