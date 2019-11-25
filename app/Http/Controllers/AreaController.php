<?php

namespace App\Http\Controllers;

use App\Area;
use App\Sede;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarAreaRequest;
use App\Http\Requests\EditarAreaRequest;

class AreaController extends Controller
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
        $sedes = Sede::orderBy('nombre','ASC')->get();
        return view('sind1.area.create', compact('sedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarAreaRequest $request)
    {
        $area = Area::create($request->all());
        session(['mensaje' => 'Área agregada con éxito.']);
        LogSistema::registrarAccion('Área agragada: '.$area->nombre);
        return redirect()->route('mantenedor_socio_area');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return view('sind1.area.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $sedes = Sede::orderBy('nombre','ASC')->get();
        return view('sind1.area.edit', compact('area','sedes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(EditarAreaRequest $request, Area $area)
    {
        $modificar = Area::findOrFail($area->id);
        $modificar->nombre = $request->nombre;
        $modificar->sede_id = $request->sede_id;
        $modificar->update();
        session(['mensaje' => 'Área editada con éxito.']);
        LogSistema::registrarAccion('Área editada, de: '.$area->nombre.' a '.$request->nombre);
        return redirect()->route('mantenedor_socio_area');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $eliminada = $area->nombre;
        Area::destroy($area->id);
        session(['mensaje' => 'Área eliminada con éxito.']);
        LogSistema::registrarAccion('Área eliminada: '.$eliminada); 
        return redirect()->route('mantenedor_socio_area');
    }

    // obtener areas
    public function obtenerAreas(Request $request){
        if($request->ajax()){
            $areas = Area::where('sede_id','=',$request->id)->get();
            return response()->json($areas);
        }
    }
}
