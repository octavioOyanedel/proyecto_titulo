<?php

namespace App\Http\Controllers;

use App\LogSistema;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\FiltrarHistorialRequest; 

class LogSistemaController extends Controller
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

        $campo = $request->get('buscar_historial'); 

        switch ($columna) {
            case 'nombre1':
                $registros = LogSistema::orderBy('usuarios.nombre1', $orden)
                ->join('usuarios', 'log_sistema.usuario_id', '=', 'usuarios.id')
                ->fechaUnica($campo)
                ->accion($campo)
                ->ip($campo)
                ->navegador($campo)
                ->sistema($campo)                 
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_historial' => $campo,                               
                ]); 
            break;
            case 'apellido1':
                $registros = LogSistema::orderBy('usuarios.apellido1', $orden)
                ->join('usuarios', 'log_sistema.usuario_id', '=', 'usuarios.id')
                ->fechaUnica($campo)
                ->accion($campo)
                ->ip($campo)
                ->navegador($campo)
                ->sistema($campo)                 
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_historial' => $campo,                               
                ]); 
            break;                                                                              
            default:
                $registros = LogSistema::orderBy($columna, $orden)
                ->fechaUnica($campo)
                ->accion($campo)
                ->ip($campo)
                ->navegador($campo)
                ->sistema($campo)                
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_historial' => $campo,                               
                ]); 
            break;
        }

        $total_consulta = $registros->total();

        return view('sind1.historial.index', compact('registros','total_consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogSistema  $logSistema
     * @return \Illuminate\Http\Response
     */
    public function show(LogSistema $logSistema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogSistema  $logSistema
     * @return \Illuminate\Http\Response
     */
    public function edit(LogSistema $logSistema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogSistema  $logSistema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogSistema $logSistema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogSistema  $logSistema
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogSistema $logSistema)
    {
        //
    }

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroHistorialForm(Request $request)
    {
        $usuarios = User::orderBy('nombre1', 'ASC')->get();
        return view('sind1.historial.busqueda', compact('usuarios'));

    }

    /**
     * Busca datos personalizados.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filtroHistorial(FiltrarHistorialRequest $request)
    {
        $registros = LogSistema::orderBy('created_at', 'DESC')
        ->fecha($request->fecha_ini, $request->fecha_fin)
        ->usuarioId($request->usuario_id)        
        ->paginate(15);
        return view('sind1.historial.index', compact('registros'));

    }
}
