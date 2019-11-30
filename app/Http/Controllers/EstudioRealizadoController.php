<?php

namespace App\Http\Controllers;

use App\GradoAcademico;
use App\EstudioRealizado;
use App\EstudioRealizadoSocio;
use App\EstadoGradoAcademico;
use App\GradoAcademicoInstitucion;
use App\GradoAcademicoTitulo;
use App\Titulo;
use App\LogSistema;
use App\Socio;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarEstudioRealizadoRequest;
use App\Http\Requests\EditarEstudioRealizadoRequest;

class EstudioRealizadoController extends Controller
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
        $estados = EstadoGradoAcademico::orderBy('nombre','ASC')->get();
        return view('sind1.estudio.create', compact('grados','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarEstudioRealizadoRequest $request)
    {
        EstudioRealizado::create($request->all());
        $estudio = EstudioRealizado::obtenerUltimoEstudioIngresado();
        //almacenar estudio socio en tabla pivote
        $estudio_socio = new EstudioRealizadoSocio;
        $estudio_socio->socio_id = $request->socio_id;
        $estudio_socio->estudio_realizado_id = $estudio->id;
        $estudio_socio->save();
        //asignar nivel/institución

        //asignar nivel/titulo
        
        session(['mensaje' => 'Estudio realizado agregado con éxito.']); 
        return redirect()->route('estudios.create',['id'=>$request->input('socio_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function show(EstudioRealizado $estudioRealizado)
    {
        return view('sind1.estudio.show', compact('estudioRealizado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function update(EditarEstudioRealizadoRequest $request, $id)
    {  
        $modificar = EstudioRealizado::findOrFail($id);
        $estudioRealizado = EstudioRealizado::findOrFail($id);         
        $modificar->grado_academico_id = $request->grado_academico_id;
        $modificar->institucion_id = $request->institucion_id;
        $modificar->estado_grado_academico_id = $request->estado_grado_academico_id;
        $modificar->titulo_id = $request->titulo_id;                        
        $modificar->update();
        session(['mensaje' => 'Estudio realizado editado con éxito.']);
        LogSistema::registrarAccion('Cargo editado, de: '.convertirArrayAString($estudioRealizado->toArray()));
        $socio = Socio::findOrFail($request->socio_id);
        $prestamos = $socio->prestamos()->paginate(15);
        $estudios = $socio->estudios_realizados_socios;
        $cargas = $socio->cargas_familiares;
        return view('sind1.socios.show', compact('socio','prestamos','estudios','cargas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstudioRealizado $estudioRealizado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function editarEstudio(Request $request)
    {
        dd($request); 
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $estados = EstadoGradoAcademico::orderBy('nombre','ASC')->get();       
        $instituciones = GradoAcademicoInstitucion::all();         
        $titulos = GradoAcademicoTitulo::all();       
        //$estudio = EstudioRealizado::where('','=',);
        return view('sind1.estudio.edit', compact('grados', 'instituciones', 'estados', 'titulos', 'estudio'));
    }
}
