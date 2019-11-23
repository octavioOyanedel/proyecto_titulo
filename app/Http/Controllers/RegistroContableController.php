<?php

namespace App\Http\Controllers;

use App\RegistroContable;
use App\Cuenta;
use App\Concepto;
use App\Socio;
use App\Asociado;
use App\TipoRegistroContable;
use App\Banco;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarRegistroContableRequest;    
use App\Http\Requests\FiltrarContableRequest; 

class RegistroContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'fecha';
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'DESC';
        } 

        $campo = $request->get('buscar_registro');

        $registros = RegistroContable::orderBy($columna, $orden)
        ->numeroRegistro($campo)
        ->cheque($campo)
        ->montoUnico($campo)                                     
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,
            'buscar_prestamo' => $campo,                               
        ]); 

        $total_consulta = $registros->total();

        return view('sind1.contables.index', compact('registros','total_consulta'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = Socio::orderBy('apellido1')->get();
        $cuentas = Cuenta::all();
        $conceptos = Concepto::where('id','<>',57)->orderBy('nombre')->get();
        $tipos_registro = TipoRegistroContable::orderBy('nombre')->get();
        $asociados = Asociado::orderBy('concepto')->get();
        return view('sind1.contables.create', compact('tipos_registro','cuentas','conceptos','socios','asociados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarRegistroContableRequest $request) 
    {

        $registro = new RegistroContable;
        $registro->fecha = $request->fecha;
        $registro->numero_registro = $request->numero_registro;
        $registro->cheque = $request->cheque;
        $registro->monto = $request->monto;
        $registro->concepto_id = $request->concepto_id;
        $registro->detalle = $request->detalle;
        $registro->tipo_registro_contable_id = $request->tipo_registro_contable_id;
        $registro->cuenta_id = $request->cuenta_id;
        $registro->asociado_id = $request->asociado_id;
        $registro->usuario_id = $request->usuario_id;
        $registro->socio_id = $request->socio_id;
        $registro->save();
        $tipo = TipoRegistroContable::findOrfail($request->tipo_registro_contable_id);
        $socios = Socio::orderBy('apellido1')->get();
        $cuentas = Cuenta::all();
        $conceptos = Concepto::where('id','<>',57)->orderBy('nombre')->get();
        $tipos_registro = TipoRegistroContable::orderBy('nombre')->get();
        $asociados = Asociado::orderBy('concepto')->get();
        session(['mensaje' => 'Registro contable agregado con éxito.']);
        if($request->tipo_registro_contable_id === 1){
            LogSistema::registrarAccion('Registro contable agregado N°: '.$request->numero_registro.', tipo: '.$tipo->nombre.', cheque: '.$request->cheque);
        }else{
            LogSistema::registrarAccion('Registro contable agregado N°: '.$request->numero_registro.', tipo: '.$tipo->nombre);           
        }

        return redirect()->route('contables.create', compact('tipos_registro','cuentas','conceptos','socios','asociados'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegistroContable  $registroContable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registroContable = RegistroContable::findOrFail($id);
        return view('sind1.contables.show', compact('registroContable'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegistroContable  $registroContable
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroContable $registroContable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegistroContable  $registroContable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroContable $registroContable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegistroContable  $registroContable
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroContable $registroContable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function verificarCheque(Request $request) 
    {
        if ($request->ajax()) {
            $registro = RegistroContable::where('cheque','=',$request->elemento)->get();
            if(count($registro) != 0){
                return response()->json(1); //si existe
            }else{
                return response()->json(0);
            }           
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function verificarNumero(Request $request) 
    {
        if ($request->ajax()) {
            $registro = RegistroContable::where([
                ['numero_registro','=',$request->elemento],
                ['tipo_registro_contable_id','=',$request->tipo]
            ]);

            if($registro->count() > 0){     
                return response()->json(1); //si existe        
            }else{
                return response()->json(0);                   
            }            
        }
    }

    // obtener conceptos
    public function obtenerConceptos(Request $request){
        $coleccion = array();
        if($request->ajax()){
            $conceptos = Concepto::where('tipo_registro_id','=',$request->id)->get();
            foreach ($conceptos as $c) {
                array_push($coleccion,array('id'=>$c->id,'nombre'=>$c->nombre));
            }
            return response()->json($coleccion);
        }
    }   

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroContablesForm(Request $request)
    {
        $socios = Socio::orderBy('apellido1')->get();
        $cuentas = Cuenta::all();
        $conceptos = Concepto::orderBy('nombre')->get();
        $tipos_registro = TipoRegistroContable::orderBy('nombre')->get();
        $asociados = Asociado::orderBy('concepto')->get();
        return view('sind1.contables.busqueda', compact('tipos_registro', 'cuentas', 'socios', 'asociados'));
    }

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroContables(FiltrarContableRequest $request)
    {
        $registros = RegistroContable::orderBy('fecha','DESC')
        ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
        ->monto($request->monto_ini, $request->monto_fin)
        ->tipoRegistroContableId($request->tipo_registro_contable_id)
        ->cuentaId($request->cuenta_id)
        ->conceptoId($request->concepto_id)
        ->socioId($request->socio_id)
        ->asociadoId($request->asociado_id)
        ->detalle($request->detalle)        
        ->paginate(15);
        return view('sind1.contables.index', compact('registros'));   
    }
}
