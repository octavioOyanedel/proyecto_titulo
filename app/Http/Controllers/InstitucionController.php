<?php

namespace App\Http\Controllers;

use App\Institucion;
use App\GradoAcademico;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $e = '';
        return redirect()->route('mantenedor_estudios', compact('e'))->with('agregar-institucion','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion)
    {
        //
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
    public function destroy(Institucion $institucion)
    {
        if ($request->ajax()) {
            return Institucion::destroy($request->id);   
        }  
    }
}
