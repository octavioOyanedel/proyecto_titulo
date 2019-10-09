@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Editar Datos Socio</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf

                        @include('partials.components.elementos.nombre1') 

                        @include('partials.components.elementos.nombre2') 

                        @include('partials.components.elementos.apellido1')

                        @include('partials.components.elementos.apellido2')
                        
                        @include('partials.components.elementos.rut') 

                        @include('partials.components.elementos.genero') 

                        @include('partials.components.elementos.fecha_nac') 

                        @include('partials.components.elementos.celular')

                        @include('partials.components.elementos.correo')

                        @include('partials.components.elementos.direccion')

                        @include('partials.components.elementos.fecha_pucv')

                        @include('partials.components.elementos.anexo')

                        @include('partials.components.elementos.numero_socio')

                        @include('partials.components.elementos.fecha_sind1')

                        @include('partials.components.elementos.comuna')
                        
                        <!-- Ciudad -->
                        <div class="form-group row">
                            <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
                            <div class="col-md-6">
                            <select id="ciudad_id" class="default-selects form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" autocomplete="ciudad_id" autofocus>
                                <option selected="true" value="">Seleccione...</option>
                            </select>
                            @error('ciudad_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                        <!-- Sede -->
                        <div class="form-group row">
                                <label for="sede_id" class="col-md-4 col-form-label text-md-right">{{ __('Sede') }}</label>
                                <div class="col-md-6">
                                <select id="sede_id" class="default-selects form-control @error('sede_id') is-invalid @enderror" name="sede_id" autocomplete="sede_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($sedes as $s)
                                    <option value="{{ $s->id }}" {{ $socio->getOriginal('sede_id') == $s->id ? 'selected' : ''}}>{{ $s->nombre }}</option>
                                    @endforeach
                                    <option value="new">Nuevo...</option>
                                </select>
                                @error('sede_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>      
                        <!-- Nueva sede -->
                        <div class="form-group new-divs row d-none" id="new_div_central">
                            <label for="nueva_sede" class="col-md-4 col-form-label text-md-right"><span class="bg-warning text-dark pl-2 pr-2 pt-1 pb-1 rounded"><b>Nueva sede</b></span></label>
                            <div class="col-md-6">
                                <input id="nueva_sede" type="text" class="new-inputs form-control @error('nueva_sede') is-invalid @enderror" name="nueva_sede" value="{{ old('nueva_sede') }}" autocomplete="nueva_sede" autofocus>
                                @error('nueva_sede')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>     
                        <!-- Área -->
                        <div class="form-group row">
                                <label for="area_id" class="col-md-4 col-form-label text-md-right">{{ __('Área') }}</label>
                                <div class="col-md-6">
                                <select id="area_id" class="default-selects form-control @error('area_id') is-invalid @enderror" name="area_id" autocomplete="area_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    <option value="new">Nuevo...</option>
                                </select>
                                @error('area_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>               
                        <!-- Nueva área -->
                        <div class="form-group new-divs row d-none" id="new_div_area">
                            <label for="nueva_area" class="col-md-4 col-form-label text-md-right"><span class="bg-warning text-dark pl-2 pr-2 pt-1 pb-1 rounded"><b>Nueva área</b></span></label>
                            <div class="col-md-6">
                                <input id="nueva_area" type="text" class="new-inputs form-control @error('nueva_area') is-invalid @enderror" name="nueva_area" value="{{ old('nueva_area') }}"  autocomplete="nueva_area" autofocus>
                                @error('nueva_area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Cargo -->
                        <div class="form-group row">
                                <label for="cargo_id" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>
                                <div class="col-md-6">
                                <select id="cargo_id" class="default-selects form-control @error('cargo_id') is-invalid @enderror" name="cargo_id" autocomplete="cargo_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($cargos as $c)
                                    <option value="{{ $c->id }}" {{ $socio->getOriginal('cargo_id') == $c->id ? 'selected' : ''}}>{{ $c->nombre }}</option>
                                    @endforeach
                                    <option value="new">Nuevo...</option>
                                </select>
                                @error('cargo_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>   
                        <!-- Nueva cargo -->
                        <div class="form-group new-divs row d-none" id="new_div_job">
                            <label for="nuevo_cargo" class="col-md-4 col-form-label text-md-right"><span class="bg-warning text-dark pl-2 pr-2 pt-1 pb-1 rounded"><b>Nuevo cargo</b></span></label>
                            <div class="col-md-6">
                                <input id="nuevo_cargo" type="text" class="new-inputs form-control @error('nuevo_cargo') is-invalid @enderror" name="nuevo_cargo" value="{{ old('nuevo_cargo') }}" autocomplete="nuevo_cargo" autofocus>
                                @error('nuevo_cargo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>   
                        <!-- Situación -->
                        <div class="form-group row">
                                <label for="estado_socio_id" class="col-md-4 col-form-label text-md-right">{{ __('Situación') }}</label>
                                <div class="col-md-6">
                                <select id="estado_socio_id" class="default-selects form-control @error('estado_socio_id') is-invalid @enderror" name="estado_socio_id" autocomplete="estado_socio_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($estados as $e)
                                        <option value="{{ $e->id }}" {{ $socio->getOriginal('estado_socio_id') == $e->id ? 'selected' : ''}}>{{ $e->nombre }}</option>
                                    @endforeach
                                    <option value="new">Nuevo...</option>
                                </select>
                                @error('estado_socio_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Nueva situación -->
                        <div class="form-group new-divs row d-none" id="new_div_situation">
                            <label for="nuevo_estado_socio" class="col-md-4 col-form-label text-md-right"><span class="bg-warning text-dark pl-2 pr-2 pt-1 pb-1 rounded"><b>Nueva situación</b></span></label>
                            <div class="col-md-6">
                                <input id="nuevo_estado_socio" type="text" class="new-inputs form-control @error('nuevo_estado_socio') is-invalid @enderror" name="nuevo_estado_socio" value="{{ old('nuevo_estado_socio') }}" autocomplete="nuevo_estado_socio" autofocus>
                                @error('nuevo_estado_socio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Nacionalidad -->
                        <div class="form-group row">
                            <label for="nacionalidad_id" class="col-md-4 col-form-label text-md-right">{{ __('Nacionalidad') }}</label>
                            <div class="col-md-6">
                                <select id="nacionalidad_id" class="default-selects form-control @error('nacionalidad_id') is-invalid @enderror" name="nacionalidad_id" autocomplete="nacionalidad_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($nacionalidades as $n)
                                    <option value="{{ $n->id }}" {{ $socio->getOriginal('nacionalidad_id') == $n->id ? 'selected' : ''}}>{{ $n->nombre }}</option>
                                    @endforeach
                                    <option value="new">Nuevo...</option>
                                </select>
                                @error('nacionalidad_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>                
                        <!-- Nueva nacionalidad -->
                        <div class="form-group new-divs row d-none" id="new_div_nation">
                            <label for="nueva_nacionalidad" class="col-md-4 col-form-label text-md-right"><span class="bg-warning text-dark pl-2 pr-2 pt-1 pb-1 rounded"><b>Nueva nacionalidad</b></span></label>
                            <div class="col-md-6">
                                <input id="nueva_nacionalidad" type="text" class="new-inputs form-control @error('nueva_nacionalidad') is-invalid @enderror" name="nueva_nacionalidad" value="{{ old('nueva_nacionalidad') }}" autocomplete="nueva_nacionalidad" autofocus>
                                @error('nueva_nacionalidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>     
                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>                                                                                                                                                                                                                                                                                                                      
                        <!-- fin form -->                                                                                                                 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
