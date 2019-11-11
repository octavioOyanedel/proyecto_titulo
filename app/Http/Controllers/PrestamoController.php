<?php

namespace App\Http\Controllers;

use App\Prestamo;
use App\Cuota;
use App\FormaPago;
use App\Interes;
use App\Socio;
use App\EstadoDeuda;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarPrestamoRequest;

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
    public function store(IncorporarPrestamoRequest $request)
    {
        Prestamo::create($request->all()); 
        $prestamo = Prestamo::obtenerUltimoPrestamoIngresado();
        if($request->deposito === '0'){
            Prestamo::agregarCuotasPrestamo($prestamo);       
        }           
        return redirect()->route('prestamos.create')->with('agregar-prestamo','');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        $interes = null;
        if($prestamo->forma_pago_id === '1'){
            $interes = Interes::findOrFail($prestamo->getOriginal('interes_id'));
        }
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
     * @param  \App\Prestamo  $prestamo
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function simulacion(Request $request) 
    {
        $forma_pago_original = $request['forma_pago_id'];
        $interes = null;
        $cuotas = null;
        $total = null;

        if ($request['forma_pago_id'] != null) {
            $request['forma_pago_id'] = FormaPago::findOrFail($request['forma_pago_id'])->nombre;
        }

        $socio = Socio::findOrFail($request->socio_id);
        $estado = EstadoDeuda::findOrFail(2); //1 - pagada | 2 - pendiente |  - atrasada

        if($forma_pago_original === '1'){
            $interes = Interes::findOrFail(1); //unico interes
            $cuotas = crearArregloCuotas($request->numero_cuotas, $request->fecha_solicitud, $request->monto);     
            $total = obtenerTotalPrestamo($cuotas);      
        }     

        return view('sind1.prestamos.simulacion', compact('forma_pago_original', 'request', 'socio', 'estado', 'interes', 'cuotas', 'total'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelarDeposito($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $interes = null;
        if($prestamo->forma_pago_id === '1'){
            $interes = Interes::findOrFail($prestamo->getOriginal('interes_id'));
        }
        $prestamo->estado_deuda_id = 1;
        $prestamo->update();
        return redirect()->route('prestamos.show', compact('prestamo','interes'))->with('cancelar-deposito','');    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cambiarEstadoDeposito(Request $request)
    {
        $prestamos = null;
        if ($request->ajax()) {
            $prestamos = Prestamo::where([
                ['forma_pago_id','=',2],
                ['estado_deuda_id','=',2],
                ['fecha_pago_deposito','<',date('Y-m-d')]
            ])->get();   

            foreach ($prestamos as $prestamo) {
                $prestamo->estado_deuda_id = 3;
                $prestamo->update();
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagoAutomaticoCuotas(Request $request)
    {
        $cuotas = null;
        if ($request->ajax()) {
            $cuotas = Cuota::where([
                ['fecha_pago','<=', date('Y-m-d')]
            ])->get();   

            foreach ($cuotas as $cuota) {
                $cuota->estado_deuda_id = 1;
                $cuota->update();
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saldarPrestamo(Request $request)
    {
        $prestamos = null;
        if ($request->ajax()) {
            $prestamos = Prestamo::where([
                ['forma_pago_id','=',1],
                ['estado_deuda_id','=',2]
            ])->get();   

            foreach ($prestamos as $prestamo) {
                $pagadas = 0;
                foreach ($prestamo->cuotas as $cuota) {
                    if($cuota->estado_deuda_id === 2){
                        $pagadas ++;
                    }
                }
                return ($pagadas.' - '.$prestamo->numero_cuotas);
                if($pagadas == $prestamo->numero_cuotas){
                    $prestamo->estado_deuda_id = 1; //1 - pagada
                    $prestamo->update();
                }
            }
        }
    }    
}
