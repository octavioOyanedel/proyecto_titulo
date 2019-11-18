<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarUsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Rol::orderBy('nombre','ASC')->get();
        $campo = $request->get('buscar_usuario');
        $usuarios = User::orderBy('apellido1','ASC')
        ->nombre1($campo)
        ->nombre2($campo)
        ->apellido1($campo)
        ->apellido2($campo)
        ->email($campo)
        ->get();
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
    public function store(IncorporarUsuarioRequest $request) //Hash::make($data['password'])
    {
        $usuario = new User;
        $usuario->nombre1 = $request->nombre1;
        $usuario->nombre2 = $request->nombre2;
        $usuario->apellido1 = $request->apellido1;
        $usuario->apellido2 = $request->apellido2;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->rol_id = $request->rol_id;
        $usuario->save();
        $roles = Rol::orderBy('nombre','ASC')->get();
        session(['mensaje' => 'Usuario agregado con éxito.']);
        return redirect()->route('register', compact('roles'));  
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
            $usuario = User::where('email','=',$request->elemento)->get();
            if(count($usuario) != 0){
                return response()->json(1); //si existe
            }else{
                return response()->json(0);
            }
            
        }
    }
}

