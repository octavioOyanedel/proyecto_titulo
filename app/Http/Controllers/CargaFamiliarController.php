<?php

namespace App\Http\Controllers;

use App\CargaFamiliar;
use App\Parentesco;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarCargaRequest;

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
        CargaFamiliar::create($request->all());        
        return redirect()->route('cargas.create',['id'=>$request->input('socio_id')])->with('agregar-carga','');
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
    public function update(Request $request, CargaFamiliar $cargaFamiliar)
    {
        //
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
