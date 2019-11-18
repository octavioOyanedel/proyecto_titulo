<?php

namespace App\Http\Controllers;

use App\GradoAcademicoInstitucion;
use App\Institucion;
use App\GradoAcademico;
use Illuminate\Http\Request;

class GradoAcademicoInstitucionController extends Controller
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
        Institucion::create($request->all()); 
        session(['mensaje' => 'Institución agregada con éxito.']);
        return redirect()->route('mantenedor_estudios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Titulo::create($request->all());
        session(['mensaje' => 'Título agregado con éxito.']);
        return redirect()->route('mantenedor_estudios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GradoAcademicoInstitucion  $gradoAcademicoInstitucion
     * @return \Illuminate\Http\Response
     */
    public function show(GradoAcademicoInstitucion $gradoAcademicoInstitucion)
    {
        $institucion = Institucion::findOrFail($id);
        return view('sind1.institucion.show', compact('institucion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GradoAcademicoInstitucion  $gradoAcademicoInstitucion
     * @return \Illuminate\Http\Response
     */
    public function edit(GradoAcademicoInstitucion $gradoAcademicoInstitucion)
    {
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $institucion = Institucion::findOrFail($id);
        return view('sind1.institucion.edit', compact('institucion','grados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GradoAcademicoInstitucion  $gradoAcademicoInstitucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradoAcademicoInstitucion $gradoAcademicoInstitucion)
    {
        $modificar = Institucion::findOrFail($id);
        $modificar->nombre = $request->nombre;
        $modificar->update();     
        session(['mensaje' => 'Institución educacional editada con éxito.']);     
        return redirect()->route('mantenedor_estudios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GradoAcademicoInstitucion  $gradoAcademicoInstitucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradoAcademicoInstitucion $gradoAcademicoInstitucion)
    {
        Institucion::destroy($id);
        session(['mensaje' => 'Institución educacional eliminada con éxito.']);        
        return redirect()->route('mantenedor_estudios');  
    }

    // obtener instituciones
    public function obtenerInstituciones(Request $request){
        $coleccion = array();
        if($request->ajax()){
            $instituciones = GradoAcademicoInstitucion::where('grado_academico_id','=',$request->id)->get();
            foreach ($instituciones as $i) {
                array_push($coleccion,array('id'=>$i->getOriginal('institucion_id'),'nombre'=>$i->institucion_id));
            }
            return response()->json($coleccion);
        }
    }   
}
