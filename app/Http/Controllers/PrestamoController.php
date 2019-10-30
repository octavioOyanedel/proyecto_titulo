<?php

namespace App\Http\Controllers;

use App\Prestamo;
use App\FormaPago;
use App\Interes;
use App\Socio;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();

        $campo = $request->get('buscar_prestamo');
        $prestamos = Prestamo::orderBy('fecha_solicitud', 'DESC')
        ->numeroEgreso($campo)
        ->cheque($campo)
        ->get();
               
        return view('sind1.prestamos.index', compact('prestamos','formas_pago'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        return view('sind1.prestamos.create', compact('formas_pago'));
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
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        $interes = Interes::findOrFail($prestamo->getOriginal('interes_id'));
        return view('sind1.prestamos.show', compact('prestamo','interes'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function verificarCheque(Request $request) 
    {
        if ($request->ajax()) {
            $prestamo = Prestamo::where('cheque','=',$request->elemento)->get();
            if(count($prestamo) != 0){
                return response()->json(1); //si existe
            }else{
                return response()->json(0);
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function verificarNumeroEgreso(Request $request) 
    {
        if ($request->ajax()) {
            $prestamo = Prestamo::where('numero_egreso','=',$request->elemento)->get();
            if(count($prestamo) != 0){
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
    public function verificarRut(Request $request) 
    {
        if ($request->ajax()) {
            $socio = Socio::where('rut','=',$request->elemento)->get();
            if(count($socio) != 0){
                //si existe, buscar prestamo
                return response()->json(Prestamo::verificarPrestamoPendiente($socio[0]->id));
            }else{
                return response()->json(0); //no existe
            }
            
        }
    }
}
