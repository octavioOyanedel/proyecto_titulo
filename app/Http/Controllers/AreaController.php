<?php

namespace App\Http\Controllers;

use App\Area;
use App\Sede;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarAreaRequest;

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
    public function store(Request $request)
    {
        $e = '';
        Area::create($request->all());
        $sedes = Sede::orderBy('nombre','ASC')->get();
        return redirect()->route('mantenedor_socios', compact('sedes','e'))->with('agregar-area','');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $e = '';
        $sedes = Sede::orderBy('nombre','ASC')->get();
        return view('sind1.area.edit', compact('area','sedes','e'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(IncorporarAreaRequest $request, Area $area)
    {
        $e = '';
        $modificar = Area::findOrFail($area->id);
        $modificar->nombre = $request->nombre;
        $modificar->sede_id = $request->sede_id;
        $modificar->update();
        return redirect()->route('mantenedor_socios', compact('e'))->with('editar-area',''); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            return Area::destroy($request->id);   
        }       
    }

    // obtener areas
    public function obtenerAreas(Request $request){
        if($request->ajax()){
            $areas = Area::where('sede_id','=',$request->id)->get();
            return response()->json($areas);
        }
    }   
}
