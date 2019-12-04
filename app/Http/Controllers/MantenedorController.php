<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Area;
use App\Cargo;
use App\EstadoSocio;
use App\Nacionalidad;
use App\FormaPago;
use App\Cuenta;
use App\TipoCuenta;
use App\Concepto;
use App\Asociado;
use App\User;
use App\Rol;
use App\Banco;
use App\Parentesco;
use App\GradoAcademico;
use App\Institucion;
use App\EstadoGradoAcademico;
use App\Titulo;
use Illuminate\Http\Request;

class MantenedorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioSede(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_sede');

        $sedes = Sede::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_sede' => $campo,        
        ]); 

        $total_consulta = $sedes->total();
        return view('sind1.mantenedores.socio.sede', compact('sedes','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioArea(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_area');

        switch ($columna) {        
            case 'sede_id':
                $areas = Area::orderBy('sedes.nombre',$orden)
                ->join('sedes', 'areas.sede_id', '=', 'sedes.id')
                ->nombre($campo)
                ->sede($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_area' => $campo,            
                ]); 
            break;                          
            default:
                $areas = Area::orderBy($columna,$orden)
                ->nombre($campo)
                ->sede($campo)                                          
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,   
                    'buscar_area' => $campo,                             
                ]); 
            break;
        }

        $total_consulta = $areas->total();        
        return view('sind1.mantenedores.socio.area', compact('areas','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioCargo(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_cargo');

        $cargos = Cargo::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_cargo' => $campo,        
        ]);

        $total_consulta = $cargos->total();        
        return view('sind1.mantenedores.socio.cargo', compact('cargos','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioEstado(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_estado_socio');

        $estados = EstadoSocio::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_estado_socio' => $campo,        
        ]);
        
        $total_consulta = $estados->total();        
        return view('sind1.mantenedores.socio.estado', compact('estados','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socioNacionalidad(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_nacionalidad');

        $nacionalidades = Nacionalidad::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_nacionalidad' => $campo,        
        ]);
        $total_consulta = $nacionalidades->total();        
        return view('sind1.mantenedores.socio.nacionalidad', compact('nacionalidades','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargaParentesco(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_parentesco');

        $parentescos = Parentesco::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_parentesco' => $campo,        
        ]);

        $total_consulta = $parentescos->total();        
        return view('sind1.mantenedores.carga.parentesco', compact('parentescos','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudioNivel(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_nivel');

        $grados = GradoAcademico::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_nivel' => $campo,        
        ]);
        $total_consulta = $grados->total();        
        return view('sind1.mantenedores.estudio.nivel', compact('grados','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudioInstitucion(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_institucion');

        $instituciones = Institucion::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_institucion' => $campo,        
        ]);
        $total_consulta = $instituciones->total();        
        return view('sind1.mantenedores.estudio.institucion', compact('instituciones','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudioEstadoNivel(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_estado_nivel');

        $estados = EstadoGradoAcademico::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_estado_nivel' => $campo,        
        ]);
        $total_consulta = $estados->total();        
        return view('sind1.mantenedores.estudio.estado_nivel', compact('estados','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estudioTitulo(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_titulo');

        $titulos = Titulo::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_titulo' => $campo,        
        ]);
        $total_consulta = $titulos->total();        
        return view('sind1.mantenedores.estudio.titulo', compact('titulos','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prestamoFormaPago(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_pago');

        $formas_pago = FormaPago::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_pago' => $campo,        
        ]);
        $total_consulta = $formas_pago->total();        
        return view('sind1.mantenedores.prestamo.forma_pago', compact('formas_pago','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableCuenta(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'numero';
        }

        $campo = $request->get('buscar_cuenta');

        switch ($columna) {        
            case 'tipo_cuenta_id':
                $cuentas = Cuenta::orderBy('tipos_cuenta.nombre', $orden)
                ->join('tipos_cuenta', 'cuentas.tipo_cuenta_id', '=', 'tipos_cuenta.id')
                ->numeroCuenta($campo)           
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_cuenta' => $campo,                               
                ]); 
            break;
            case 'banco_id':
                $cuentas = Cuenta::orderBy('bancos.nombre', $orden)
                ->join('bancos', 'cuentas.banco_id', '=', 'bancos.id')
                ->numeroCuenta($campo)           
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_cuenta' => $campo,                               
                ]); 
            break;                       
            default:
                $cuentas = Cuenta::orderBy($columna, $orden)
                ->numeroCuenta($campo)                                             
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,   
                    'buscar_cuenta' => $campo,                             
                ]); 
            break;
        }
        $total_consulta = $cuentas->total();        
        return view('sind1.mantenedores.contable.cuenta', compact('cuentas','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableBanco(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_banco');

        $bancos = Banco::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_banco' => $campo,        
        ]);
        $total_consulta = $bancos->total();        
        return view('sind1.mantenedores.contable.banco', compact('bancos','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableConcepto(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_concepto');

        switch ($columna) {        
            case 'tipo_registro_contable_id':
                $conceptos = Concepto::orderBy('tipos_registro_contable.nombre',$orden)
                ->join('tipos_registro_contable', 'conceptos.tipo_registro_contable_id', '=', 'tipos_registro_contable.id')
                ->concepto($campo)
                ->tipoRegistroContabele($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_concepto' => $campo,            
                ]); 
            break;                          
            default:
                $conceptos = Concepto::orderBy($columna, $orden)
                ->concepto($campo)
                ->tipoRegistroContabele($campo)                                          
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,   
                    'buscar_concepto' => $campo,                             
                ]); 
            break;
        }

        $total_consulta = $conceptos->total();        
        return view('sind1.mantenedores.contable.concepto', compact('conceptos','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableTipoCuenta(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_tipo_cuenta');

        $tipos_cuenta = TipoCuenta::orderBy($columna,$orden)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_tipo_cuenta' => $campo,        
        ]);
        $total_consulta = $tipos_cuenta->total();        
        return view('sind1.mantenedores.contable.tipo_cuenta', compact('tipos_cuenta','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contableAsociado(Request $request)
    {

        if(request()->has('registros') && request('registros') != ''){
            $registros = request('registros');
        }else{
            $registros = 15;
        }

        if(request()->has('orden') && request('orden') != ''){
            $orden = request('orden');
        }else{
            $orden = 'ASC';
        }

        if(request()->has('columna') && request('columna') != ''){
            $columna = request('columna');
        }else{
            $columna = 'nombre';
        }

        $campo = $request->get('buscar_asociado');

        $asociados = Asociado::orderBy($columna,$orden)
        ->concepto($campo)
        ->nombre($campo)
        ->paginate($registros)->appends([
            'registros' => $registros,
            'columna' => $columna,
            'orden' => $orden,    
            'buscar_asociado' => $campo,        
        ]);


        $total_consulta = $asociados->total();        
        return view('sind1.mantenedores.contable.asociado', compact('asociados','total_consulta'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cerrarAlerta(Request $request)
    {
        if($request->ajax()){
            session()->forget('mensaje');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estadisticaGenero()
    {
        $sedes = Sede::orderBy('nombre','ASC')->get();
        $areas = Area::orderBy('nombre','ASC')->get();
        return view('sind1.estadistica.estadistica',compact('sedes','areas'));
    }


}
