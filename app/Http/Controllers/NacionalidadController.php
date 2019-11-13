<?php

namespace App\Http\Controllers;

use App\Nacionalidad;
use Illuminate\Http\Request;

class NacionalidadController extends Controller
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
        return view('sind1.nacionalidades.create');
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
        return redirect()->route('mantenedor_socios', compact('e'))->with('agregar-nacionalidad',''); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nacionalidad  $nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function show(Nacionalidad $nacionalidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nacionalidad  $nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $e = '';
        $nacionalidad = Nacionalidad::findOrFail($id);
        return view('sind1.nacionalidades.edit', compact('nacionalidad','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nacionalidad  $nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nacionalidad $nacionalidad)
    {
        $e = '';
        return redirect()->route('mantenedor_socios', compact('e'))->with('editar-nacionalidad',''); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nacionalidad  $nacionalidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nacionalidad $nacionalidad)
    {
        if ($request->ajax()) {
            return Nacionalidad::destroy($request->id);   
        }  
    }
}
