<?php

namespace App\Http\Controllers;

use App\CargaFamiliar;
use App\Parentesco;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarCargaRequest;
use App\Http\Requests\EditarCargaRequest;

class CargaFamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentescos = Parentesco::orderBy('nombre','ASC')->get();
        return view('sind1.carga.create', compact('parentescos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarCargaRequest $request)
    {
        //dd($request);
        $carga = CargaFamiliar::create($request->all());
        session(['mensaje' => 'Carga familiar incorporada con éxito.']);
        LogSistema::registrarAccion('Carga familiar agragada: '.$carga->parentesco_id.', nombre: '.$carga->nombre1.' '.$carga->apellido1.' rut: '.$carga->rut);
        return redirect()->route('cargas.create',['id'=>$request->input('socio_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CargaFamiliar  $cargaFamiliar
     * @return \Illuminate\Http\Response
     */
    public function show(CargaFamiliar $cargaFamiliar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CargaFamiliar  $cargaFamiliar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargaFamiliar = CargaFamiliar::findOrFail($id);
        $parentescos = Parentesco::orderBy('nombre','ASC')->get();
        return view('sind1.carga.edit', compact('cargaFamiliar','parentescos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CargaFamiliar  $cargaFamiliar
     * @return \Illuminate\Http\Response
     */
    public function update(EditarCargaRequest $request, $id)
    {
        $r = array();
        $r = array_slice($request->toArray(),2);

        dd($r);

        $modificar = CargaFamiliar::findOrFail($id);
        $cargaFamiliar = CargaFamiliar::findOrFail($id);
        //dd($cargaFamiliar);
        $modificar->nombre1 = $request->nombre1;
        $modificar->nombre2 = $request->nombre2;
        $modificar->apellido1 = $request->apellido1;
        $modificar->apellido2 = $request->apellido2;
        $modificar->rut = $request->rut;
        $modificar->fecha_nac = $request->fecha_nac;
        $modificar->socio_id = $request->socio_id;
        $modificar->parentesco_id = $request->parentesco_id;
        $modificar->update();
        session(['mensaje' => 'Carga familiar editada con éxito.']);
        //LogSistema::registrarAccion('Carga familiar editada, de: '.convertirArray($cargaFamiliar).' a '.convertirArray($request));
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CargaFamiliar  $cargaFamiliar
     * @return \Illuminate\Http\Response
     */
    public function destroy(CargaFamiliar $cargaFamiliar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CargaFamiliar  $carga
     * @return \Illuminate\Http\Response
     */
    public function verificarRut(Request $request)
    {
        if ($request->ajax()) {
            $carga = CargaFamiliar::where('rut','=',$request->elemento)->get();
            if(count($carga) != 0){
                return response()->json(1);
            }else{
                return response()->json(0); //no existe
            }

        }
    }
}
