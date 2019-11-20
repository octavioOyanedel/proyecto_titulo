<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarUsuarioRequest;
use App\Http\Requests\EditarUsuarioRequest;
use App\Http\Requests\EditarPasswordRequest;

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
        ->paginate(15);
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
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('sind1.usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
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
    public function update(EditarUsuarioRequest $request, User $usuario)
    {
        $modificar = User::findOrFail($usuario->id);
        $modificar->nombre1 = $request->nombre1;
        $modificar->nombre2 = $request->nombre2;
        $modificar->apellido1 = $request->apellido1;
        $modificar->apellido2 = $request->apellido2;    
        $modificar->email = $request->email;
        $modificar->rol_id = $request->rol_id;   
        $modificar->update(); 
        session(['mensaje' => 'Usuario editado con éxito.']); 
        return redirect()->route('usuarios.index');                               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        User::destroy($usuario->id);
        session(['mensaje' => 'Usuario eliminado con éxito.']);        
        return redirect()->route('usuarios.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function mostrarEliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('sind1.usuario.eliminar', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function editPassword(User $usuario)
    {
        return view('sind1.usuario.password', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(EditarPasswordRequest $request)
    {
        $modificar = User::findOrFail($request->user_id);
        $modificar->password = Hash::make($request->password);
        $modificar->update(); 
        session(['mensaje' => 'Contraseña editada con éxito.']); 
        return redirect()->route('usuarios.index');              
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

