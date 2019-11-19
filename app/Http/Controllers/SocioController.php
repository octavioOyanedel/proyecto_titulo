<?php

namespace App\Http\Controllers;

use App\Socio;
use App\Comuna;
use App\Sede;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;
use App\Prestamo;
use App\CargaFamiliar;
use App\Interes;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarSocioRequest;
use App\Http\Requests\EditarSocioRequest;

class SocioController extends Controller
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
        $comunas = Comuna::orderBy('nombre', 'ASC')->get();
        $sedes = Sede::orderBy('nombre', 'ASC')->get();
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();
        return view('sind1.socios.create', compact('cargos', 'estados', 'nacionalidades', 'comunas', 'sedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarSocioRequest $request)
    {
        Socio::create($request->all());
        $socio = Socio::obtenerUltimoSocioIngresado();
        session(['mensaje' => 'Socio incorporado con éxito.']); 
        return redirect()->route('cargas.create',['id'=>$socio->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {
        $prestamos = $socio->prestamos()->simplePaginate(10);
        $estudios = $socio->estudios_realizados_socios;
        $cargas = $socio->cargas_familiares;
        return view('sind1.socios.show', compact('socio','prestamos','estudios','cargas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function edit(Socio $socio)
    {
        $comunas = Comuna::orderBy('nombre', 'ASC')->get();
        $sedes = Sede::orderBy('nombre', 'ASC')->get();
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();
        return view('sind1.socios.edit', compact('socio','cargos', 'estados', 'nacionalidades', 'comunas', 'sedes'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(EditarSocioRequest $request, Socio $socio)
    {
        $modificar = Socio::findOrFail($socio->id);
        $modificar->nombre1 = $request->nombre1;
        $modificar->nombre2 = $request->nombre2;
        $modificar->apellido1 = $request->apellido1;
        $modificar->apellido2 = $request->apellido2;
        $modificar->rut = $request->rut;
        $modificar->genero = $request->genero;
        $modificar->fecha_nac = $request->fecha_nac;
        $modificar->celular = $request->celular;
        $modificar->correo = $request->correo;
        $modificar->direccion = $request->direccion;
        $modificar->fecha_pucv = $request->fecha_pucv;
        $modificar->anexo = $request->anexo;
        $modificar->numero_socio = $request->numero_socio;
        $modificar->fecha_sind1 = $request->fecha_sind1;
        $modificar->comuna_id = $request->comuna_id;
        $modificar->ciudad_id = $request->ciudad_id;
        $modificar->sede_id = $request->sede_id;
        $modificar->area_id = $request->area_id;        
        $modificar->cargo_id = $request->cargo_id;
        $modificar->estado_socio_id = $request->estado_socio_id;
        $modificar->nacionalidad_id = $request->nacionalidad_id;
        $modificar->update(); 
        session(['mensaje' => 'Socio editado con éxito.']); 
        return redirect()->route('home');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socio $socio) 
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function verificarRut(Request $request) 
    {
        $socio = null;
        if ($request->ajax()) {
            $socios = Socio::where('rut','=',$request->elemento)->get();
            if(count($socios) != 0){
                return response()->json(1); //si existe
            }else{
                return response()->json(0);
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function verificarNumeroSocio(Request $request) 
    {
        if ($request->ajax()) {
            $socios = Socio::where('numero_socio','=',$request->elemento)->get();
            if(count($socios) != 0){
                return response()->json(1); //si existe
            }else{
                return response()->json(0);
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function verificarCorreo(Request $request) 
    {
        if ($request->ajax()) {
            $socios = Socio::where('correo','=',trim($request->elemento))->get();                    
            if(count($socios) != 0){
                return response()->json(1); //si existe
            }else{
                return response()->json(0);
            }            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function obtenerIdSocioConRut(Request $request) 
    {
        if ($request->ajax()) {
            $socio = Socio::where('rut','=',trim($request->elemento))->first();
            if($socio != null ){
                return $socio->id;
            }else{
                return null;
            }            
        }
    }
}
