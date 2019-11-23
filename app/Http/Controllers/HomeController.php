<?php

namespace App\Http\Controllers;

use App\Socio;
use App\EstadoSocio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$orders = Socio::onlyTrashed()->orderBy('apellido1','ASC')->get();
        //dd($request);

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

        $varones = Socio::where('genero','=','Varón')->count();
        $damas = Socio::where('genero','=','Dama')->count();
        $total = Socio::all()->count();

        $estados = EstadoSocio::where('id','>',1)->orderBy('nombre','ASC')->get();
        
        $campo = $request->get('buscar_socio');

        switch ($columna) {        
            case 'sede_id':
                $socios = Socio::orderBy('sedes.nombre',$orden)
                ->join('sedes', 'socios.sede_id', '=', 'sedes.id')
                ->rut($campo)
                ->nombre1($campo)
                ->nombre2($campo)
                ->apellido1($campo)
                ->apellido2($campo)
                ->celular($campo)
                ->anexo($campo)
                ->correo($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,
                    'buscar_socio' => $campo,            
                ]); 
            break;
            case 'area_id':
                $socios = Socio::orderBy('areas.nombre',$orden)
                ->join('areas', 'socios.area_id', '=', 'areas.id')
                ->rut($campo)
                ->nombre1($campo)
                ->nombre2($campo)
                ->apellido1($campo)
                ->apellido2($campo)
                ->celular($campo)
                ->anexo($campo)
                ->correo($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,    
                    'buscar_socio' => $campo,        
                ]); 
            break;     
            case 'cargo_id':
                $socios = Socio::orderBy('cargos.nombre',$orden)
                ->join('cargos', 'socios.cargo_id', '=', 'cargos.id')
                ->rut($campo)
                ->nombre1($campo)
                ->nombre2($campo)
                ->apellido1($campo)
                ->apellido2($campo)
                ->celular($campo)
                ->anexo($campo)
                ->correo($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden, 
                    'buscar_socio' => $campo,                               
                ]); 
            break;                                   
            default:
                $socios = Socio::orderBy($columna, $orden)
                ->rut($campo)
                ->nombre1($campo)
                ->nombre2($campo)
                ->apellido1($campo)
                ->apellido2($campo)
                ->celular($campo)
                ->anexo($campo)
                ->correo($campo)
                ->numeroSocio($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,   
                    'buscar_socio' => $campo,                             
                ]); 
            break;
        }

        $total_consulta = $socios->total();

        return view('home', compact('socios','estados','varones','damas','total','total_consulta'));
    }

}
