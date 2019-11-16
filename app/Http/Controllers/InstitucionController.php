<?php

namespace App\Http\Controllers;

use App\Institucion;
use App\GradoAcademico;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarInstitucionRequest;


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
        Institucion::create($request->all()); 
        session(['mensaje' => 'Institución agregada con éxito.']);
        return redirect()->route('mantenedor_estudios');
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
        $e = '';
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $institucion = Institucion::findOrFail($id);
        return view('sind1.institucion.edit', compact('institucion','grados','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucion)
    {
        $e = '';
        return redirect()->route('mantenedor_estudios', compact('e'))->with('editar-institucion','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Institucion::destroy($id);
        session(['mensaje' => 'Institución educacional eliminada con éxito.']);        
        return redirect()->route('mantenedor_estudios');  
    }
}
