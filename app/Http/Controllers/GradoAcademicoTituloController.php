<?php

namespace App\Http\Controllers;

use App\GradoAcademicoTitulo;
use Illuminate\Http\Request;

class GradoAcademicoTituloController extends Controller
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
     * @param  \App\GradoAcademicoTitulo  $gradoAcademicoTitulo
     * @return \Illuminate\Http\Response
     */
    public function show(GradoAcademicoTitulo $gradoAcademicoTitulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GradoAcademicoTitulo  $gradoAcademicoTitulo
     * @return \Illuminate\Http\Response
     */
    public function edit(GradoAcademicoTitulo $gradoAcademicoTitulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GradoAcademicoTitulo  $gradoAcademicoTitulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradoAcademicoTitulo $gradoAcademicoTitulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GradoAcademicoTitulo  $gradoAcademicoTitulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradoAcademicoTitulo $gradoAcademicoTitulo)
    {
        //
    }

    // obtener titulos
    public function obtenerTitulos(Request $request){
        $coleccion = array();
        if($request->ajax()){
            $titulos = GradoAcademicoTitulo::where('titulo_id','=',$request->id)->get();
            foreach ($titulos as $t) {
                array_push($coleccion,array('id'=>$t->getOriginal('titulo_id'),'nombre'=>$t->titulo_id));
            }
            return response()->json($coleccion);
        }
    }  
}
