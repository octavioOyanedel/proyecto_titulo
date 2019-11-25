<?php

namespace App\Http\Controllers;

use App\Prestamo;
use App\Cuota;
use App\FormaPago;
use App\Interes;
use App\Socio;
use App\EstadoDeuda;
use App\RegistroContable;
use App\Cuenta;
use App\LogSistema;
use App\TipoCuenta;
use App\Banco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarPrestamoRequest;
use App\Http\Requests\SimularPrestamoRequest;
use App\Http\Requests\FiltrarPrestamoRequest;

class PrestamoController extends Controller
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
            $columna = 'fecha_solicitud';
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'DESC';
        } 

        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();

        $campo = $request->get('buscar_prestamo');

        if(Prestamo::obtenerSocioPorRut($campo) != null){
            $campo = Prestamo::obtenerSocioPorRut($campo)->id;
        }

        switch ($columna) {
            case 'socio_id':
                $prestamos = Prestamo::orderBy('socios.apellido1', $orden)
                ->join('socios', 'prestamos.socio_id', '=', 'socios.id')
                ->numeroEgreso($campo)
                ->cheque($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,                               
                ]); 
            break;     
            case 'rut':
                $prestamos = Prestamo::orderBy('socios.rut', $orden)
                ->join('socios', 'prestamos.socio_id', '=', 'socios.id')
                ->numeroEgreso($campo)
                ->cheque($campo)              
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,                               
                ]); 
            break;
            case 'tipo_cuenta_id':
                $prestamos = Prestamo::orderBy('tipos_cuenta.nombre', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->join('tipos_cuenta', 'cuentas.tipo_cuenta_id', '=', 'tipos_cuenta.id')
                ->numeroEgreso($campo)
                ->cheque($campo)               
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,                               
                ]); 
            break;
            case 'numero':
                $prestamos = Prestamo::orderBy('cuentas.numero', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->numeroEgreso($campo)
                ->cheque($campo)               
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,                               
                ]); 
            break;
            case 'banco_id':
                $prestamos = Prestamo::orderBy('bancos.nombre', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->join('bancos', 'cuentas.banco_id', '=', 'bancos.id')
                ->numeroEgreso($campo)
                ->cheque($campo)             
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,                               
                ]); 
            break;
            case 'forma_pago_id':
                $prestamos = Prestamo::orderBy('formas_pago.nombre', $orden)
                ->join('formas_pago', 'prestamos.forma_pago_id', '=', 'formas_pago.id')
                ->numeroEgreso($campo)
                ->cheque($campo)             
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,                               
                ]); 
            break;
            case 'estado_deuda_id':
                $prestamos = Prestamo::orderBy('estados_deuda.nombre', $orden)
                ->join('estados_deuda', 'prestamos.estado_deuda_id', '=', 'estados_deuda.id')
                ->numeroEgreso($campo)
                ->cheque($campo)              
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,                               
                ]); 
            break;                                                               
            default:
                $prestamos = Prestamo::orderBy($columna, $orden)
                ->estadoDeudaId($campo)
                ->fechaUnica($campo)
                ->numeroCuenta($campo)                        
                ->numeroEgreso($campo)
                ->formaPagoId($campo)                
                ->cheque($campo)
                ->rut($campo) 
                ->montoUnico($campo)                                    
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,                               
                ]); 
            break;
        }

        $total_consulta = $prestamos->total();

        return view('sind1.prestamos.index', compact('prestamos','formas_pago','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentas = Cuenta::all();
        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        return view('sind1.prestamos.create', compact('formas_pago','cuentas'));
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
        if($prestamo->getoriginal('forma_pago_id') === 1){
            Prestamo::agregarCuotasPrestamo($prestamo);
        }
        $registro = new RegistroContable;
        $registro->fecha = $prestamo->getOriginal('fecha_solicitud');
        $registro->numero_registro = $prestamo->numero_egreso;
        $registro->cheque = $prestamo->cheque;
        $registro->monto = $prestamo->getOriginal('monto');
        $registro->concepto_id = 57; //57 préstamo
        $registro->detalle = null;
        $registro->tipo_registro_contable_id = 1;
        $registro->cuenta_id = 2;
        $registro->asociado_id = null;
        $registro->usuario_id = Auth::user()->id;
        $registro->socio_id = $prestamo->socio_id;
        $registro->save();
        session(['mensaje' => 'Préstamo agregado con éxito.']);
        LogSistema::registrarAccion('Préstamo agregado N° egreso: '.$prestamo->numero_egreso.', cheque: '.$prestamo->cheque.', socio: '.$prestamo->socio->nombre1.' '.$prestamo->socio->apellido1.' rut: '.$prestamo->socio->rut);
        return redirect()->route('prestamos.create');
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
            $prestamo = RegistroContable::where('cheque','=',$request->elemento)->get();
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
            $prestamo = RegistroContable::where([
                ['numero_registro','=',$request->elemento],
                ['tipo_registro_contable_id','=',1]
            ])->get();
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
    public function simulacion(SimularPrestamoRequest $request)
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
                    if($cuota->getOriginal('estado_deuda_id') === 1){
                        $pagadas++;
                    }
                }
                if($pagadas == $prestamo->numero_cuotas){
                    $prestamo->estado_deuda_id = 1; //1 - pagada
                    $prestamo->update();
                }
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagoCuota(Request $request)
    {
        $cuotas = null;
        if ($request->ajax()) {
            $cuotas = Cuota::where([
                ['estado_deuda_id','=',2]
            ])->get();

            foreach ($cuotas as $cuota) {
                if($cuota->getOriginal('fecha_pago') === date('Y-m-d')){
                    $cuota->estado_deuda_id = 1; //1 - pagada
                    $cuota->update();
                }
            }
        }
    }

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroPrestamosForm(Request $request)
    {
        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        return view('sind1.prestamos.busqueda', compact('formas_pago'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function filtroPrestamos(FiltrarPrestamoRequest $request)
    {

        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        $prestamos = Prestamo::orderBy('fecha_solicitud', 'DESC')
        ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
        ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
        ->monto($request->monto_ini, $request->monto_fin)
        ->numeroCuotas($request->numero_cuotas)
        ->formaPagoId($request->forma_pago_id)
        ->rut($request->rut)
        ->paginate(15);

        return view('sind1.prestamos.index', compact('prestamos','formas_pago'));
    }
}
