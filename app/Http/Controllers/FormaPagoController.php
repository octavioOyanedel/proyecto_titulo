<?php

namespace App\Http\Controllers;

use App\FormaPago;
use Illuminate\Http\Request;
use App\Http\Requests\IncorporarFormaPagoRequest;

class FormaPagoController extends Controller
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
        FormaPago::create($request->all());
        session(['mensaje' => 'Forma de pago agregada con éxito.']);
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
    public function update(IncorporarFormaPagoRequest $request, $id)
    {
        $modificar = FormaPago::findOrFail($id);
        $modificar->nombre = $request->nombre;
        $modificar->update();             
        session(['mensaje' => 'Forma de pago editada con éxito.']); 
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
        FormaPago::destroy($id);
        session(['mensaje' => 'Forma de pago eliminada con éxito.']);        
        return redirect()->route('mantenedor_prestamo_forma_pago'); 
    }
}
