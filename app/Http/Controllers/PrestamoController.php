<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cuota;
use App\Socio;
use App\Cuenta;
use App\Interes;
use App\Prestamo;
use App\FormaPago;
use App\LogSistema;
use App\TipoCuenta;
use App\EstadoDeuda;
use App\RegistroContable;
use Illuminate\Http\Request;
use App\Exports\PrestamoExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FiltroPrestamoExport;
use App\Exports\BusquedaPrestamoExport;
use App\Http\Requests\FiltrarPrestamoRequest;
use App\Http\Requests\SimularPrestamoRequest;
use App\Http\Requests\IncorporarPrestamoRequest;

class PrestamoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('administrador', ['only' => ['create', 'store', 'simulacion']]);

        //$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    }

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
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoId($request->forma_pago_id)
                ->rut($request->rut)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'rut':
                $prestamos = Prestamo::orderBy('socios.rut', $orden)
                ->join('socios', 'prestamos.socio_id', '=', 'socios.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoId($request->forma_pago_id)
                ->rut($request->rut)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'tipo_cuenta_id':
                $prestamos = Prestamo::orderBy('tipos_cuenta.nombre', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->join('tipos_cuenta', 'cuentas.tipo_cuenta_id', '=', 'tipos_cuenta.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoId($request->forma_pago_id)
                ->rut($request->rut)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'numero':
                $prestamos = Prestamo::orderBy('cuentas.numero', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoId($request->forma_pago_id)
                ->rut($request->rut)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'banco_id':
                $prestamos = Prestamo::orderBy('bancos.nombre', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->join('bancos', 'cuentas.banco_id', '=', 'bancos.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoId($request->forma_pago_id)
                ->rut($request->rut)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'forma_pago_id':
                $prestamos = Prestamo::orderBy('formas_pago.nombre', $orden)
                ->join('formas_pago', 'prestamos.forma_pago_id', '=', 'formas_pago.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoId($request->forma_pago_id)
                ->rut($request->rut)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'estado_deuda_id':
                $prestamos = Prestamo::orderBy('estados_deuda.nombre', $orden)
                ->join('estados_deuda', 'prestamos.estado_deuda_id', '=', 'estados_deuda.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoId($request->forma_pago_id)
                ->rut($request->rut)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_prestamo' => $campo,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'rut' => $request->rut,
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
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'rut' => $request->rut,
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
        LogSistema::registrarAccion('Préstamo agragado: '.convertirArrayAString($prestamo->toArray()));
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
        return redirect()->route('home');
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
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        return redirect()->route('home');
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
        $prestamos = Prestamo::orderBy('fecha_solicitud','DESC')->paginate(15);
        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        $total_consulta = $prestamos->total();

        $prestamo = Prestamo::findorFail($id);
        $prestamo->estado_deuda_id = 1;
        $prestamo->update();
        session(['mensaje' => 'Préstamo cancelado con éxito.']);
        return redirect()->route('prestamos.index', compact('prestamos','formas_pago','total_consulta'));
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
        $cuentas = Cuenta::all();
        $estados = EstadoDeuda::orderBy('nombre','ASC')->get();
        $formas_pago = FormaPago::orderBy('nombre', 'ASC')->get();
        return view('sind1.prestamos.busqueda', compact('formas_pago','cuentas','estados'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function filtroPrestamos(FiltrarPrestamoRequest $request)
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

        switch ($columna) {
            case 'socio_id':
                $prestamos = Prestamo::orderBy('socios.apellido1', $orden)
                ->join('socios', 'prestamos.socio_id', '=', 'socios.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->scopeFormaPagoFiltro($request->forma_pago_id)
                ->rutFiltro($request->rut)
                ->cuentaId($request->cuenta_id)
                ->estadoDeudaIdFiltro($request->estado_deuda_id)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'cuenta_id' => $request->cuenta_id,
                    'estado_deuda_id' => $request->estado_deuda_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'rut':
                $prestamos = Prestamo::orderBy('socios.rut', $orden)
                ->join('socios', 'prestamos.socio_id', '=', 'socios.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoFiltro($request->forma_pago_id)
                ->rutFiltro($request->rut)
                ->cuentaId($request->cuenta_id)
                ->estadoDeudaIdFiltro($request->estado_deuda_id)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'cuenta_id' => $request->cuenta_id,
                    'estado_deuda_id' => $request->estado_deuda_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'tipo_cuenta_id':
                $prestamos = Prestamo::orderBy('tipos_cuenta.nombre', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->join('tipos_cuenta', 'cuentas.tipo_cuenta_id', '=', 'tipos_cuenta.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoFiltro($request->forma_pago_id)
                ->rutFiltro($request->rut)
                ->cuentaId($request->cuenta_id)
                ->estadoDeudaIdFiltro($request->estado_deuda_id)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'cuenta_id' => $request->cuenta_id,
                    'estado_deuda_id' => $request->estado_deuda_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'numero':
                $prestamos = Prestamo::orderBy('cuentas.numero', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoFiltro($request->forma_pago_id)
                ->rutFiltro($request->rut)
                ->cuentaId($request->cuenta_id)
                ->estadoDeudaIdFiltro($request->estado_deuda_id)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'cuenta_id' => $request->cuenta_id,
                    'estado_deuda_id' => $request->estado_deuda_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'banco_id':
                $prestamos = Prestamo::orderBy('bancos.nombre', $orden)
                ->join('cuentas', 'prestamos.cuenta_id', '=', 'cuentas.id')
                ->join('bancos', 'cuentas.banco_id', '=', 'bancos.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoFiltro($request->forma_pago_id)
                ->rutFiltro($request->rut)
                ->cuentaId($request->cuenta_id)
                ->estadoDeudaIdFiltro($request->estado_deuda_id)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'cuenta_id' => $request->cuenta_id,
                    'estado_deuda_id' => $request->estado_deuda_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'forma_pago_id':
                $prestamos = Prestamo::orderBy('formas_pago.nombre', $orden)
                ->join('formas_pago', 'prestamos.forma_pago_id', '=', 'formas_pago.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoFiltro($request->forma_pago_id)
                ->rutFiltro($request->rut)
                ->cuentaId($request->cuenta_id)
                ->estadoDeudaIdFiltro($request->estado_deuda_id)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'cuenta_id' => $request->cuenta_id,
                    'estado_deuda_id' => $request->estado_deuda_id,
                    'rut' => $request->rut,
                ]);
            break;
            case 'estado_deuda_id':
                $prestamos = Prestamo::orderBy('estados_deuda.nombre', $orden)
                ->join('estados_deuda', 'prestamos.estado_deuda_id', '=', 'estados_deuda.id')
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoFiltro($request->forma_pago_id)
                ->rutFiltro($request->rut)
                ->cuentaId($request->cuenta_id)
                ->estadoDeudaIdFiltro($request->estado_deuda_id)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'cuenta_id' => $request->cuenta_id,
                    'estado_deuda_id' => $request->estado_deuda_id,
                    'rut' => $request->rut,
                ]);
            break;
            default:
                $prestamos = Prestamo::orderBy($columna, $orden)
                ->fechaSolicitud($request->fecha_solicitud_ini, $request->fecha_solicitud_fin)
                ->fechaPago($request->fecha_pago_ini, $request->fecha_pago_fin)
                ->monto($request->monto_ini, $request->monto_fin)
                ->numeroCuotas($request->numero_cuotas)
                ->formaPagoFiltro($request->forma_pago_id)
                ->rutFiltro($request->rut)
                ->cuentaId($request->cuenta_id)
                ->estadoDeudaIdFiltro($request->estado_deuda_id)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'fecha_solicitud_ini' => $request->fecha_solicitud_ini,
                    'fecha_solicitud_fin' => $request->fecha_solicitud_fin,
                    'fecha_pago_ini' => $request->fecha_pago_ini,
                    'fecha_pago_fin' => $request->fecha_pago_fin,
                    'monto_ini' => $request->monto_ini,
                    'monto_fin' => $request->monto_fin,
                    'numero_cuotas' => $request->numero_cuotas,
                    'forma_pago_id' => $request->forma_pago_id,
                    'cuenta_id' => $request->cuenta_id,
                    'estado_deuda_id' => $request->estado_deuda_id,
                    'rut' => $request->rut,
                ]);
            break;
        }

        $total_consulta = $prestamos->total();

        ($request->fecha_solicitud_ini) ?  $fecha_solicitud_ini = $request->fecha_solicitud_ini : $fecha_solicitud_ini = 'null';
        ($request->fecha_solicitud_fin) ?  $fecha_solicitud_fin = $request->fecha_solicitud_fin : $fecha_solicitud_fin = 'null';
        ($request->fecha_pago_ini) ?  $fecha_pago_ini = $request->fecha_pago_ini : $fecha_pago_ini = 'null';
        ($request->fecha_pago_fin) ?  $fecha_pago_fin = $request->fecha_pago_fin : $fecha_pago_fin = 'null';
        ($request->monto_ini) ?  $monto_ini = $request->monto_ini : $monto_ini = 'null';
        ($request->monto_fin) ?  $monto_fin = $request->monto_fin : $monto_fin = 'null';
        ($request->numero_cuotas) ?  $numero_cuotas = $request->numero_cuotas : $numero_cuotas = 'null';
        ($request->forma_pago_id) ?  $forma_pago_id = $request->forma_pago_id : $forma_pago_id = 'null';
        ($request->cuenta_id) ?  $cuenta_id = $request->cuenta_id : $cuenta_id = 'null';
        ($request->estado_deuda_id) ?  $estado_deuda_id = $request->estado_deuda_id : $estado_deuda_id = 'null';
        ($request->rut) ?  $rut = $request->rut : $rut = 'null';

        return view('sind1.prestamos.resultados', compact('prestamos', 'formas_pago', 'total_consulta', 'rut', 'fecha_solicitud_ini', 'fecha_solicitud_fin', 'monto_ini', 'monto_fin', 'forma_pago_id', 'fecha_pago_ini', 'fecha_pago_fin', 'numero_cuotas', 'cuenta_id', 'estado_deuda_id'));
    }

    /**
     * Exportar a excel.
     */
    public function exportarExcel()
    {
        return Excel::download(new PrestamoExport, 'listado_prestamos.xlsx');
    }

    /**
     * Exportar a excel.
     */
    public function exportarExcelFiltro($rut, $fecha_solicitud_ini, $fecha_solicitud_fin, $monto_ini, $monto_fin, $forma_pago_id, $fecha_pago_ini, $fecha_pago_fin, $numero_cuotas, $cuenta_id, $estado_deuda_id)
    {
        return Excel::download(new FiltroPrestamoExport($rut, $fecha_solicitud_ini, $fecha_solicitud_fin, $monto_ini, $monto_fin, $forma_pago_id, $fecha_pago_ini, $fecha_pago_fin, $numero_cuotas, $cuenta_id, $estado_deuda_id), 'listado_prestamos.xlsx');
    }   

    /**
     * Exportar a excel.
     */
    public function exportarExcelBusqueda($buscar_prestamo)
    {
        return Excel::download(new BusquedaPrestamoExport($buscar_prestamo), 'listado_prestamos.xlsx');
    }    
}
