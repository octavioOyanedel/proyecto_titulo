@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('partials.alertas')

            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Detalle Socio</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <div class="table-responsive">
                        <h4>Información Personal</h4>
                        <table class="table table-hover table-striped table-bordered">
                            <thead></thead>
                            <tbody>
                                <tr><th>Nombre</th><td>{{ $socio->nombre1 }} {{ $socio->nombre2 }} {{ $socio->apellido1 }} {{ $socio->apellido2 }}</td></tr> 
                                <tr><th>Rut</th><td>{{ $socio->rut }}</td></tr>
                                <tr><th>Género</th><td>{{ $socio->genero }}</td></tr>
                                <tr><th>Fecha nacimiento</th><td>{{ $socio->fecha_nac }}</td></tr>
                                <tr><th>Celular</th><td>{{ $socio->celular }}</td></tr>
                                <tr><th>Correo</th><td>{{ $socio->correo }}</td></tr>                                    
                                <tr><th>Fecha ingreso PUCV</th><td>{{ $socio->fecha_pucv }}</td></tr>
                                <tr><th>Anexo</th><td>{{ $socio->anexo }}</td></tr>
                                <tr><th>Número Socio</th><td>{{ $socio->numero_socio }}</td></tr>
                                <tr><th>Fecha ingreso Sind1</th><td>{{ $socio->fecha_sind1 }}</td></tr>
                                <tr><th>Comuna</th><td>{{ $socio->comuna_id }}</td></tr>
                                <tr><th>Ciudad</th><td>{{ $socio->ciudad_id }}</td></tr>
                                <tr><th>Dirección</th><td>{{ $socio->direccion }}</td></tr>
                                <tr><th>Sede</th><td>{{ $socio->sede_id }}</td></tr>
                                <tr><th>Área</th><td>{{ $socio->area_id }}</td></tr>
                                <tr><th>Cargo</th><td>{{ $socio->cargo_id }}</td></tr>
                                <tr><th>Estado socio</th><td>{{ $socio->estado_socio_id }}</td></tr>
                                <tr><th>Nacionalidad</th><td>{{ $socio->nacionalidad_id }}</td></tr>
                            </tbody>
                        </table>                         
                    </div>

                    @if($estudios->count() === 0 && $estudios != null)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>Socio sin estudios registrados.
                                @if(Auth::user()->rol_id != 'Invitado')
                                    <a href="{{ route('estudios.create', ['id'=>$socio->id]) }}">Agregar estudio.</a>
                                @endif
                            </b>
                        </div>    
                    @else     
                        <div class="table-responsive">
                            <h4 class="mt-4">Estudios Realizados 
                                @if(Auth::user()->rol_id != 'Invitado')
                                    <a href="{{ route('estudios.create', ['id'=>$socio->id]) }}" class="btn btn-primary btn-sm float-right">Agregar Estudio</a>
                                @endif
                            </h4>                      
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            @if(Auth::user()->rol_id != 'Invitado')
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            @endif
                                            <th scope="col">Nivel educacional</th>
                                            <th scope="col">Institución</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Título obtenido</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($estudios as $s)
                                            <tr>
                                                @if(Auth::user()->rol_id != 'Invitado')
                                                    <td width="50" class="text-center" scope="row" title="Editar estudio"><a class="text-secondary" href="{{ route('estudios.edit', $s->id) }}"><span>@svg('editar')</span></a></td>
                                                    <td width="50" class="text-center" scope="row" title="Eliminar estudio"><a class="text-danger" href="{{ route('estudios.show', $s->id) }}"><span>@svg('eliminar')</span></a></td>
                                                @endif
                                                <td>{{ $s->estudio_realizado->grado_academico_id }}</td>
                                                <td>{{ $s->estudio_realizado->institucion_id }}</td>
                                                <td>{{ $s->estudio_realizado->estado_grado_academico_id }}</td>
                                                <td>{{ $s->estudio_realizado->titulo_id }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> 
                        </div>                           
                    @endif  

                    @if($cargas->count() === 0 && $cargas != null)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>Socio sin cargas familiares registradas. 
                                @if(Auth::user()->rol_id != 'Invitado')
                                    <a href="{{ route('cargas.create', ['id'=>$socio->id]) }}">Agregar carga familiar</a>
                                @endif
                            </b>
                        </div>                               
                    @else
                        <div class="table-responsive">
                            <h4 class="mt-4">Cargas Familiares
                                @if(Auth::user()->rol_id != 'Invitado')
                                    <a href="{{ route('cargas.create', ['id'=>$socio->id]) }}" class="btn btn-primary btn-sm float-right">Agregar Carga Familiar</a>
                                @endif
                            </h4>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        @if(Auth::user()->rol_id != 'Invitado')
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        @endif
                                        <th scope="col">Nombre</th>
                                        <th class="text-center" scope="col">Rut</th>
                                        <th class="text-center" scope="col">Fecha de nacimiento</th>
                                        <th class="text-center" scope="col">Parentesco</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach($cargas as $c)
                                        <tr>
                                            @if(Auth::user()->rol_id != 'Invitado')
                                                <td width="50" class="text-center" scope="row" title="Editar carga familiar"><a class="text-secondary" href="{{ route('cargas.edit', $c->id) }}"><span>@svg('editar')</a></td>
                                                <td width="50" class="text-center" scope="row" title="Desvincular carga familiar"><a class="text-danger" href="{{ route('cargas.show', $c->id) }}"><span>@svg('eliminar')</span></td>
                                            @endif
                                            <td>{{ $c->apellido1 }} {{ $c->apellido2 }}, {{ $c->nombre1 }} {{ $c->nombre2 }}</td>
                                            <td class="text-center">{{ $c->rut }}</td>
                                            <td class="text-center">{{ $c->fecha_nac }}</td>
                                            <td class="text-center">{{ $c->parentesco_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>                                                         
                            </table>
                        </div>
                    @endif 

                    @if($prestamos->count() === 0 && $prestamos != null)
                        <div class="alert alert-dark mt-4 text-center" role="alert">
                            <b>Socio sin préstamos registrados. 
                                @if(Auth::user()->rol_id != 'Invitado')
                                    <a href="{{ route('prestamos.create') }}">Agregar préstamo</a>
                                @endif
                            </b>
                        </div>
                    @else  
                        <div class="table-responsive">                    
                        <h4 class="mt-4">Historial de Prestamos</h4>
                            <table id="tabla-prestamos-socio" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>                                       
                                        <th class="text-center" scope="col">Fecha solicitud</th>
                                        <th class="text-center" scope="col">Forma de pago</th>
                                        <th class="text-center" scope="col">Estado</th>
                                        <th class="text-center" scope="col">Número de egreso</th>
                                        <th class="text-center" scope="col">Fecha de pago depósito</th>
                                        <th class="text-center" scope="col">Cheque</th>
                                        <th class="text-center" scope="col">Monto</th>
                                        <th class="text-center" scope="col">Interés</th>
                                        <th class="text-center" scope="col">Saldo</th>                                        
                                        <th class="text-center" scope="col">Total</th>
                                        <th class="text-center" scope="col">Coutas</th>   
                                    </tr>
                                </thead>  
                                <tbody>
                                    @foreach($prestamos as $p)

                                    <tr>
                                        <td width="50" class="text-center" scope="row" title="Ver detalle socio"><a class="text-primary" href="{{ route('prestamos.show',$p) }}"><span>@svg('ver')</span></a></td>
                                        {{-- <td width="50" class="text-center" scope="row" title="Editar socio"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td> --}}
                                        <td class="text-center">{{ $p->fecha_solicitud }}</td>
                                        <td class="text-center">{{ $p->forma_pago_id }}</td>
                                        <td class="text-center">
                                            <span class="texto-deuda shadow-sm p-1 rounded">{{ textoDeudaPrestamo($p->getOriginal('estado_deuda_id')) }}</span>
                                        </td>
                                        <td class="text-center">{{ $p->numero_egreso }}</td>
                                        <td class="text-center">{{ celdaCadena($p->fecha_pago_deposito) }}</td>
                                        <td class="text-center">{{ $p->cheque }}</td>
                                        <td class="text-center">{{ $p->monto }}</td>
                                        <td class="text-center">{{$p->interes_id }}%</td>
                                        <td class="text-center">
                                            {{ celdaCadena(formatoMoneda(calculoSaldo($p->getOriginal('monto'),$p->interes_id))) }}
                                        </td>                                        
                                        <td class="text-center">
                                            {{ celdaCadena(formatoMoneda(calculoTotal($p->getOriginal('monto'),$p->interes_id))) }}
                                        </td>
                                        <td class="text-center">{{ $p->numero_cuotas }}</td>                                       
                                    </tr>
                                    @endforeach
                                </tbody>                                                        
                            </table>
                        </div>
                        <div class="mx-auto mt-4">
                            {{ $prestamos->links() }}
                        </div> 
                    @endif                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection