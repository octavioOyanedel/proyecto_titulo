<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cuenta;
use App\TipoCuenta;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarCuentaRequest;
use App\Http\Requests\EditarCuentaRequest;

class CuentaController extends Controller
{
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
        $tipos_cuenta = TipoCuenta::orderBy('nombre','ASC')->get();
        $bancos = Banco::orderBy('nombre','ASC')->get();
        return view('sind1.cuenta.create', compact('tipos_cuenta', 'bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarCuentaRequest $request)
    {
        $cuenta = Cuenta::create($request->all());
        session(['mensaje' => 'Cuenta agregada con éxito.']);
        LogSistema::registrarAccion('Cuenta agragada: '.convertirArrayAString($cuenta->toArray()));
        return redirect()->route('mantenedor_contable_cuenta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        return view('sind1.cuenta.show', compact('cuenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        $tipos_cuenta = TipoCuenta::orderBy('nombre','ASC')->get();
        $bancos = Banco::orderBy('nombre','ASC')->get();
        return view('sind1.cuenta.edit', compact('tipos_cuenta','bancos','cuenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(EditarCuentaRequest $request, Cuenta $cuenta)
    {

        $modificar = Cuenta::findOrFail($cuenta->id);
        $modificar->numero = $request->numero;
        $modificar->tipo_cuenta_id = $request->tipo_cuenta_id;
        $modificar->banco_id = $request->banco_id;
        $tipo = TipoCuenta::findOrFail($request->tipo_cuenta_id)->nombre;
        $banco = Banco::findOrFail($request->banco_id)->nombre;        
        $modificar->update();             
        session(['mensaje' => 'Cuenta editada con éxito.']);
        LogSistema::registrarAccion('Cuenta editada, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($cuenta->toArray()));
        return redirect()->route('mantenedor_contable_cuenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        $eliminada = Cuenta::findOrFail($cuenta->id);           
        Cuenta::destroy($cuenta->id);
        session(['mensaje' => 'Cuenta bancaria eliminada con éxito.']); 
        LogSistema::registrarAccion('Cuenta eliminada: '.convertirArrayAString($eliminada->toArray()));     
        return redirect()->route('mantenedor_contable_cuenta'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function verificarNumeroCuenta(Request $request) 
    {
        if ($request->ajax()) {
            $cuenta = Cuenta::where('numero','=',trim($request->elemento))->get();  
            if(count($cuenta) != 0){
                return response()->json(1); //si existe
            }else{
                return response()->json(0);
            }
            
        }
    }
}
