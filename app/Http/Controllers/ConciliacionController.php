<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\RegistroContable;
use Illuminate\Http\Request;
use App\Exports\ConciliacionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ConciliacionRequest;

class ConciliacionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $cuentas = Cuenta::all();
        return view('sind1.conciliaciones.create', compact('cuentas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConciliacionController  $conciliacionController
     * @return \Illuminate\Http\Response
     */
    public function mostrar(ConciliacionRequest $request)
    {
        $cuenta = Cuenta::findOrFail($request->cuenta_id);
        $mes = $request->mes;
        $year = $request->year;
        $fecha_inicio = obtenerFechaConciliacion($request->year.'-'.$request->mes.'-01');
        $fecha_final = obtenerFechaConciliacion($request->year.'-'.$request->mes.'-'.obtenerDiasPorMes($request->mes));
        $registros = RegistroContable::whereBetween('fecha', [date($fecha_inicio), date($fecha_final)])->where('cuenta_id', '=', $request->cuenta_id)->get();
        return view('sind1.conciliaciones.show', compact('registros','cuenta','mes','year'));
    }

    /**
     * Exportar a excel.
     */
    public function exportarExcel($cuenta,$mes,$year)
    {
        return Excel::download(new ConciliacionExport($cuenta,$mes,$year), 'listado_conciliacion_'.$mes.'_'.$year.'.xlsx');
    }
}

