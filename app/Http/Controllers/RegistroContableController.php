<?php

namespace App\Http\Controllers;

use App\RegistroContable;
use App\Cuenta;
use App\Concepto;
use App\Socio;
use App\Asociado;
use App\TipoRegistroContable;
use App\Banco;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarRegistroContableRequest;

class RegistroContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campo = $request->get('buscar_registro');
        $registros = RegistroContable::orderBy('fecha','DESC')
        ->numeroRegistro($campo)
        ->cheque($campo)
        ->get();
        return view('sind1.contables.index', compact('registros'));       
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
    public function store(IncorporarRegistroContableRequest $request) //IncorporarRegistroContableRequest
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
        $socios = Socio::orderBy('apellido1')->get();
        $cuentas = Cuenta::all();
        $conceptos = Concepto::where('id','<>',57)->orderBy('nombre')->get();
        $tipos_registro = TipoRegistroContable::orderBy('nombre')->get();
        $asociados = Asociado::orderBy('concepto')->get();
        session(['mensaje' => 'Registro contable agregado con éxito.']);
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
}
