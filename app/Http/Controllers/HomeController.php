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
        //valores por defecto
        $orden = 'DESC';
        $registros = 15;
        $columna = 'fecha_sind1';

        if(request()->has('registros') && request('registros') != '0'){
             $registros = request('registros');
        }

        if(request()->has('columna') && request('columna') != '0'){
             $columna = request('columna');
        }

        if(request()->has('orden') && request('orden') != '0'){
             $orden = request('orden');
        }

        if($columna === 'genero' && $orden === 'DESC'){
             $orden = 'ASC';
        }else if($columna === 'genero' && $orden === 'ASC'){
            $orden = 'DESC';
        }

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
                ->direccion($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,           
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
                ->direccion($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,           
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
                ->direccion($campo)
                ->paginate($registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,           
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
                ->direccion($campo)
                ->paginate( $request->registros)->appends([
                    'registros' => $registros,
                    'columna' => $columna,
                    'orden' => $orden,           
                ]); 
            break;
        }

        return view('home', compact('socios','estados'));
    }

}
