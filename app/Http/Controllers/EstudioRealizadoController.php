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

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('administrador', ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);

        //$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
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

        session(['mensaje' => 'Estudio realizado agregado con éxito.']);
        LogSistema::registrarAccion('Estudio realizado agragado: '.convertirArrayAString($estudio->toArray()));

        if($request->desde === 'create'){
            return redirect()->route('estudios.create',['id'=>$request->input('socio_id'), 'desde'=>'create']);
        }else{
            $socio = Socio::findOrFail($request->input('socio_id'));
            $prestamos = $socio->prestamos()->paginate(15);
            $estudios = $socio->estudios_realizados_socios;
            $cargas = $socio->cargas_familiares;
            return redirect()->route('socios.show', compact('socio','prestamos','estudios','cargas'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudioRealizado = EstudioRealizado::findOrFail($id);
        return view('sind1.estudio.show', compact('estudioRealizado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudioRealizado = EstudioRealizado::findOrFail($id);
        $estudioRealizadoSocio = EstudioRealizado::obtenerEstudioRealizadoSocio($id);
        $socio_id = $estudioRealizadoSocio->socio_id;
        $grados = GradoAcademico::orderBy('nombre','ASC')->get();
        $estados = EstadoGradoAcademico::orderBy('nombre','ASC')->get();
        $instituciones = GradoAcademicoInstitucion::all();
        $titulos = GradoAcademicoTitulo::all();
        return view('sind1.estudio.edit', compact('grados', 'instituciones', 'estados', 'titulos','estudioRealizado','socio_id'));
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
        $estudioRealizado = EstudioRealizado::findOrFail($id);

        if($request->titulo_id === 'Seleccione...'){
          $estudioRealizado->grado_academico_id = $request->grado_academico_id;
          $estudioRealizado->institucion_id = $request->institucion_id;
          $estudioRealizado->estado_grado_academico_id = $request->estado_grado_academico_id;
          $estudioRealizado->titulo_id = null;
          $estudioRealizado->update();
        }else{
          $estudioRealizado->grado_academico_id = $request->grado_academico_id;
          $estudioRealizado->institucion_id = $request->institucion_id;
          $estudioRealizado->estado_grado_academico_id = $request->estado_grado_academico_id;
          $estudioRealizado->titulo_id = $request->titulo_id;
          $estudioRealizado->update();
        }

        $socio = Socio::findOrFail($request->socio_id);
        $prestamos = $socio->prestamos()->paginate(15);
        $estudios = $socio->estudios_realizados_socios;
        $cargas = $socio->cargas_familiares;
        session(['mensaje' => 'Estudio realizado editado con éxito.']);
        LogSistema::registrarAccion('Estudio realizado editado, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($estudioRealizado->toArray()));
        return redirect()->route('socios.show', compact('socio','prestamos','estudios','cargas'));
        //return view('sind1.socios.show', compact('socio','prestamos','estudios','cargas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstudioRealizado  $estudioRealizado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudioRealizado = EstudioRealizado::findOrFail($id);
        $estudioRealizadoSocio = EstudioRealizado::obtenerEstudioRealizadoSocio($id);
        $socio_id = $estudioRealizadoSocio->socio_id;
        $eliminada = EstudioRealizado::findOrFail($id);
        EstudioRealizado::destroy($id);
        EstudioRealizadoSocio::destroy($id);
        $socio = Socio::findOrFail($estudioRealizadoSocio->socio_id);
        $prestamos = $socio->prestamos()->paginate(15);
        $estudios = $socio->estudios_realizados_socios;
        $cargas = $socio->cargas_familiares;
        session(['mensaje' => 'Estudio eliminado con éxito.']);
        LogSistema::registrarAccion('Estudio eliminado: '.convertirArrayAString($eliminada->toArray()));
        return view('sind1.socios.show', compact('socio','prestamos','estudios','cargas'));
    }

}
