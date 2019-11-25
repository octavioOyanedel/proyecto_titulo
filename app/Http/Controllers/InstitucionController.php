<?php

namespace App\Http\Controllers;

use App\Institucion;
use App\GradoAcademico;
use App\GradoAcademicoInstitucion;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarInstitucionRequest;
use App\Http\Requests\EditarInstitucionRequest;

class InstitucionController extends Controller
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
        return view('sind1.institucion.create', compact('grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarInstitucionRequest $request)
    {
        $institucion = Institucion::create($request->all()); 
        session(['mensaje' => 'Institución agregada con éxito.']);
        LogSistema::registrarAccion('Institución agragada: '.$institucion->nombre);
        return redirect()->route('mantenedor_estudio_institucion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institucion = Institucion::findOrFail($id);
        return view('sind1.institucion.show', compact('institucion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $institucion = Institucion::findOrFail($id);
        return view('sind1.institucion.edit', compact('institucion','grados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(EditarInstitucionRequest $request, $id)
    {
        $modificar = Institucion::findOrFail($id);
        $institucion = $modificar->nombre;
        $modificar->nombre = $request->nombre;
        $modificar->update();     
        session(['mensaje' => 'Institución educacional editada con éxito.']);   
        LogSistema::registrarAccion('Institución educacional editada, de: '.$institucion.' a '.$request->nombre);  
        return redirect()->route('mantenedor_estudio_institucion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminada = Institucion::findOrFail($id)->nombre;
        Institucion::destroy($id);
        session(['mensaje' => 'Institución educacional eliminada con éxito.']);      
        LogSistema::registrarAccion('Institución eliminada: '.$eliminada);   
        return redirect()->route('mantenedor_estudio_institucion');  
    }
}
