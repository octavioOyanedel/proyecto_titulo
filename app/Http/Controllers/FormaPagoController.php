<?php

namespace App\Http\Controllers;

use App\FormaPago;
use App\LogSistema;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarFormaPagoRequest;
use App\Http\Requests\EditarFormaPagoRequest;

class FormaPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('sind1.forma_pago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncorporarFormaPagoRequest $request)
    {
        $forma = FormaPago::create($request->all());
        session(['mensaje' => 'Forma de pago agregada con éxito.']);
        LogSistema::registrarAccion('Forma pago agragada: '.convertirArrayAString($forma->toArray()));
        return redirect()->route('mantenedor_prestamo_forma_pago');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formaPago = FormaPago::findOrFail($id);
        return view('sind1.forma_pago.show', compact('formaPago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $formaPago = FormaPago::findOrFail($id);
        return view('sind1.forma_pago.edit', compact('formaPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function update(EditarFormaPagoRequest $request, $id)
    {
        $modificar = FormaPago::findOrFail($id);
        $forma = FormaPago::findOrFail($id);
        $modificar->nombre = $request->nombre;
        $modificar->update();             
        session(['mensaje' => 'Forma de pago editada con éxito.']);
        LogSistema::registrarAccion('Forma pago editada, de: '.convertirArrayAString($request->toArray()).' >>> a >>> '.convertirArrayAString($forma->toArray()));
        return redirect()->route('mantenedor_prestamo_forma_pago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormaPago  $formaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminada = FormaPago::findOrFail($id);
        FormaPago::destroy($id);
        session(['mensaje' => 'Forma de pago eliminada con éxito.']);   
        LogSistema::registrarAccion('Forma pago eliminada: '.convertirArrayAString($eliminada->toArray()));    
        return redirect()->route('mantenedor_prestamo_forma_pago'); 
    }
}
