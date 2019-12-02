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
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarSocioRequest;
use App\Http\Requests\EditarSocioRequest;
use App\Http\Requests\FiltrarSocioRequest;
use Rap2hpoutre\FastExcel\FastExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SocioExport;
use App\Exports\FiltroSocioExport;

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
        if($request->ciudad_id === 'Seleccione...'){
            $request->ciudad_id = null;
        }
        Socio::create($request->all());
        $socio = Socio::obtenerUltimoSocioIngresado();
        session(['mensaje' => 'Socio incorporado con éxito.']);
        LogSistema::registrarAccion('Socio agragado: '.convertirArrayAString($socio->toArray()));
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
        $prestamos = $socio->prestamos()->paginate(15);
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
        if($request->ciudad_id === 'Seleccione...'){
            $request->ciudad_id = null;
        }
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
        LogSistema::registrarAccion('Socio editado, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($socio->toArray()));
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request);
        $socio = Socio::findOrFail($request->user_id);
        $socio->estado_socio_id = $request->estado_socio_id;
        $socio->update();
        $socio->delete();
        session(['mensaje' => 'Socio desvinculado con éxito.']);
        LogSistema::registrarAccion('Socio eliminado: '.convertirArrayAString($socio->toArray()));
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function mostrarEliminarSocio($id)
    {
        $estados = EstadoSocio::where('nombre','<>','Activo')->get();
        $socio = Socio::findOrFail($id);
        return view('sind1.socios.eliminar', compact('socio','estados'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function filtroSociosForm(Request $request)
    {
        $comunas = Comuna::orderBy('nombre', 'ASC')->get();
        $sedes = Sede::orderBy('nombre', 'ASC')->get();
        $cargos = Cargo::orderBy('nombre', 'ASC')->get();
        $estados = EstadoSocio::orderBy('nombre', 'ASC')->get();
        $nacionalidades = Nacionalidad::orderBy('nombre', 'ASC')->get();
        return view('sind1.socios.busqueda', compact('comunas','sedes','cargos','estados','nacionalidades'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function filtroSocios(FiltrarSocioRequest $request)
    {
        $total_consulta = 0;

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'fecha_sind1';
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'DESC';
        }

        if($columna === 'genero' && $orden === 'DESC'){
             $orden = 'ASC';
        }else if($columna === 'genero' && $orden === 'ASC'){
            $orden = 'DESC';
        }

        $estados = EstadoSocio::where('id','>',1)->orderBy('nombre','ASC')->get();
        $socios = null;

        if(request()->has('desvinculados')){
            switch (request('desvinculados')) {
                case 'activos':
                    switch ($columna) {
                        case 'sede_id':
                            $socios = Socio::orderBy('sedes.nombre',$orden)
                            ->join('sedes', 'socios.sede_id', '=', 'sedes.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        case 'area_id':
                            $socios = Socio::orderBy('areas.nombre',$orden)
                            ->join('areas', 'socios.area_id', '=', 'areas.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        case 'cargo_id':
                            $socios = Socio::orderBy('cargos.nombre',$orden)
                            ->join('cargos', 'socios.cargo_id', '=', 'cargos.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        default:
                            $socios = Socio::orderBy($columna, $orden)
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                    }
                break;
                case 'incluir':
                    switch ($columna) {
                        case 'sede_id':
                            $socios = Socio::withTrashed()->orderBy('sedes.nombre',$orden)
                            ->join('sedes', 'socios.sede_id', '=', 'sedes.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        case 'area_id':
                            $socios = Socio::withTrashed()->orderBy('areas.nombre',$orden)
                            ->join('areas', 'socios.area_id', '=', 'areas.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        case 'cargo_id':
                            $socios = Socio::withTrashed()->orderBy('cargos.nombre',$orden)
                            ->join('cargos', 'socios.cargo_id', '=', 'cargos.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        default:
                            $socios = Socio::withTrashed()->orderBy($columna, $orden)
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                    }
                break;
                case 'solo':
                    switch ($columna) {
                        case 'sede_id':
                            $socios = Socio::onlyTrashed()->orderBy('sedes.nombre',$orden)
                            ->join('sedes', 'socios.sede_id', '=', 'sedes.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        case 'area_id':
                            $socios = Socio::onlyTrashed()->orderBy('areas.nombre',$orden)
                            ->join('areas', 'socios.area_id', '=', 'areas.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        case 'cargo_id':
                            $socios = Socio::onlyTrashed()->orderBy('cargos.nombre',$orden)
                            ->join('cargos', 'socios.cargo_id', '=', 'cargos.id')
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                        default:
                            $socios = Socio::onlyTrashed()->orderBy($columna, $orden)
                            ->fechaNacimiento($request->fecha_nac_ini,$request->fecha_nac_fin)
                            ->fechaIngresoPucv($request->fecha_pucv_ini,$request->fecha_pucv_fin)
                            ->fechaIngresoSind1($request->fecha_sind1_ini,$request->fecha_sind1_fin)
                            ->genero($request->genero)
                            ->rutFiltro($request->rut)
                            ->comunaId($request->comuna_id)
                            ->ciudadId($request->ciudad_id)
                            ->direccion($request->direccion)
                            ->sedeId($request->sede_id)
                            ->areaId($request->area_id)
                            ->cargoId($request->cargo_id)
                            ->estadoSocioId($request->estado_socio_id)
                            ->nacionalidadId($request->nacionalidad_id)
                            ->paginate($registros)->appends([
                                'registros' => $registros,
                                'columna' => $columna,
                                'orden' => $orden,
                                'fecha_nac_ini' => $request->fecha_nac_ini,
                                'fecha_nac_fin' => $request->fecha_nac_fin,
                                'fecha_pucv_ini' => $request->fecha_pucv_ini,
                                'fecha_pucv_fin' => $request->fecha_pucv_fin,
                                'fecha_sind1_ini' => $request->fecha_sind1_ini,
                                'fecha_sind1_fin' => $request->fecha_sind1_fin,
                                'genero' => $request->genero,
                                'rut' => $request->rut,
                                'comuna_id' => $request->comuna_id,
                                'ciudad_id' => $request->ciudad_id,
                                'direccion' => $request->direccion,
                                'sede_id' => $request->sede_id,
                                'area_id' => $request->area_id,
                                'cargo_id' => $request->cargo_id,
                                'estado_socio_id' => $request->estado_socio_id,
                                'nacionalidad_id' => $request->nacionalidad_id,
                                'desvinculados' => $request->desvinculados,
                            ]);
                             $total_consulta = $socios->total();
                        break;
                    }
                break;
            }
        }

        ($request->fecha_nac_ini) ?  $fecha_nac_ini = $request->fecha_nac_ini : $fecha_nac_ini = 'null';
        ($request->fecha_nac_fin) ?  $fecha_nac_fin = $request->fecha_nac_fin : $fecha_nac_fin = 'null';
        ($request->fecha_pucv_ini) ?  $fecha_pucv_ini = $request->fecha_pucv_ini : $fecha_pucv_ini = 'null';
        ($request->fecha_pucv_fin) ?  $fecha_pucv_fin = $request->fecha_pucv_fin : $fecha_pucv_fin = 'null';
        ($request->fecha_sind1_ini) ?  $fecha_sind1_ini = $request->fecha_sind1_ini : $fecha_sind1_ini = 'null';
        ($request->fecha_sind1_fin) ?  $fecha_sind1_fin = $request->fecha_sind1_fin : $fecha_sind1_fin = 'null';
        ($request->genero) ?  $genero = $request->genero : $genero = 'null';
        ($request->rut) ?  $rut = $request->rut : $rut = 'null';
        ($request->comuna_id) ?  $comuna_id = $request->comuna_id : $comuna_id = 'null';
        ($request->ciudad_id) ?  $ciudad_id = $request->ciudad_id : $ciudad_id = 'null';
        ($request->direccion) ?  $direccion = $request->direccion : $direccion = 'null';
        ($request->sede_id) ?  $sede_id = $request->sede_id : $sede_id = 'null';
        ($request->area_id) ?  $area_id = $request->area_id : $area_id = 'null';
        ($request->cargo_id) ?  $cargo_id = $request->cargo_id : $cargo_id = 'null';
        ($request->estado_socio_id) ?  $estado_socio_id = $request->estado_socio_id : $estado_socio_id = 'null';
        ($request->nacionalidad_id) ?  $nacionalidad_id = $request->nacionalidad_id : $nacionalidad_id = 'null';
        ($request->desvinculados) ?  $desvinculados = $request->desvinculados : $desvinculados = 'null';

        return view('sind1.socios.resultados', compact('socios','estados','total_consulta','desvinculados','fecha_nac_ini','fecha_nac_fin','fecha_pucv_ini','fecha_pucv_fin','fecha_sind1_ini','fecha_sind1_fin','genero','rut','comuna_id','ciudad_id','direccion','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id'));
    }

    /**
     * Exportar a excel.
     */
    public function exportarExcel()
    {
        return Excel::download(new SocioExport, 'listado_socios_activos.xlsx');
        //return (new FastExcel(
        //    Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')->get()
        //))->download('listado_socios_activos.xlsx');
    }

    /**
     * Exportar a excel.
     */
    public function exportarExcelFiltro($desvinculados, $fecha_nac_ini, $fecha_nac_fin, $fecha_pucv_ini, $fecha_pucv_fin, $fecha_sind1_ini, $fecha_sind1_fin, $genero, $rut, $comuna_id, $ciudad_id, $direccion, $sede_id, $area_id, $cargo_id, $estado_socio_id, $nacionalidad_id)
    {
        return Excel::download(new FiltroSocioExport($desvinculados, $fecha_nac_ini, $fecha_nac_fin, $fecha_pucv_ini, $fecha_pucv_fin, $fecha_sind1_ini, $fecha_sind1_fin, $genero, $rut, $comuna_id, $ciudad_id, $direccion, $sede_id, $area_id, $cargo_id, $estado_socio_id, $nacionalidad_id), 'listado_socios_activos.xlsx');
        //return (new FastExcel(
        //    Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')->get()
        //))->download('listado_socios_activos.xlsx');
    }
}
