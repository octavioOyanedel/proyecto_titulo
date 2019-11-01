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
        $roles = Rol::orderBy('nombre','ASC')->get();
        $usuarios = User::orderBy('apellido1','ASC')->get();
        return view('sind1.usuario.index', compact('usuarios','roles'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function verificarCorreo(Request $request) 
    {
        if ($request->ajax()) {
            $usuario = User::where('email','=',trim($request->elemento))->get();
            if(count($usuario) != 0){
                return response()->json(1); //si existe
            }else{
                return response()->json(0);
            }
            
        }
    }
}

