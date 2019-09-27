@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Incorporar Socio</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf
                        <!-- Nombre -->
                        <div class="form-group row">
                            <label for="nombre1" class="col-md-4 col-form-label text-md-right">{{ __('Primer nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre1" type="text" class="form-control @error('nombre1') is-invalid @enderror" name="nombre1" value="{{ old('nombre1') }}" required autocomplete="nombre1" autofocus>
                                @error('nombre1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Nombre 2 -->
                        <div class="form-group row">
                            <label for="nombre2" class="col-md-4 col-form-label text-md-right">{{ __('Segundo nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre2" type="text" class="form-control @error('nombre2') is-invalid @enderror" name="nombre2" value="{{ old('nombre2') }}" autocomplete="nombre2" autofocus>
                                @error('nombre2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>  
                        <!-- Apellido -->
                        <div class="form-group row">
                            <label for="apellido1" class="col-md-4 col-form-label text-md-right">{{ __('Apellido paterno') }}</label>
                            <div class="col-md-6">
                                <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ old('apellido1') }}" required autocomplete="apellido1" autofocus>
                                @error('apellido1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Apellido 2-->
                        <div class="form-group row">
                            <label for="apellido2" class="col-md-4 col-form-label text-md-right">{{ __('Apellido materno') }}</label>
                            <div class="col-md-6">
                                <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ old('apellido2') }}" autocomplete="apellido2" autofocus>
                                @error('apellido2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Rut -->
                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>
                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="rut" autofocus>
                                @error('rut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Género -->
                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>
                            <div class="col-md-6">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" class="w-50" name="options" id="option1" autocomplete="off"> Dama
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" class="w-50" name="options" id="option2" autocomplete="off"> Varón
                                    </label>
                                </div>
                                @error('genero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 
                        <!-- Fecha nacimiento -->
                        <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ old('fecha_nac') }}" required autocomplete="fecha_nac" autofocus>
                                @error('fecha_nac')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Celular -->
                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>
                                @error('celular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Correo -->
                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                            <div class="col-md-6">
                                <input id="correo" type="correo" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required autocomplete="correo" autofocus>
                                @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>   

                        <!-- Dirección -->
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                                @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>      
                        <!-- Fecha ingreso pucv -->
                        <div class="form-group row">
                            <label for="fecha_pucv" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de ingreso PUCV') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_pucv" type="date" class="form-control @error('fecha_pucv') is-invalid @enderror" name="fecha_pucv" value="{{ old('fecha_pucv') }}" required autocomplete="fecha_pucv" autofocus>
                                @error('fecha_pucv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>   
                        <!-- Anexo -->
                        <div class="form-group row">
                            <label for="anexo" class="col-md-4 col-form-label text-md-right">{{ __('Anexo') }}</label>
                            <div class="col-md-6">
                                <input id="anexo" type="text" class="form-control @error('anexo') is-invalid @enderror" name="anexo" value="{{ old('anexo') }}" required autocomplete="anexo" autofocus>
                                @error('anexo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Número socio -->
                        <div class="form-group row">
                            <label for="numero_socio" class="col-md-4 col-form-label text-md-right">{{ __('Número de socio') }}</label>
                            <div class="col-md-6">
                                <input id="numero_socio" type="text" class="form-control @error('numero_socio') is-invalid @enderror" name="numero_socio" value="{{ old('numero_socio') }}" required autocomplete="numero_socio" autofocus>
                                @error('numero_socio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Fecha ingreso sind1 -->
                        <div class="form-group row">
                            <label for="fecha_sind1" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de ingreso Sind1') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_sind1" type="date" class="form-control @error('fecha_sind1') is-invalid @enderror" name="fecha_sind1" value="{{ old('fecha_sind1') }}" required autocomplete="fecha_sind1" autofocus>
                                @error('fecha_sind1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Comuna -->
                        <div class="form-group row">
                            <label for="comuna_id" class="col-md-4 col-form-label text-md-right">{{ __('Comuna') }}</label>
                            <div class="col-md-6">
                               <select id="comuna_id" class="default-selects form-control @error('comuna_id') is-invalid @enderror" name="comuna_id" required autocomplete="comuna_id" autofocus>
                                <option selected="true" value="">Seleccione...</option>
                                @foreach($comunas as $c)
                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                @endforeach
                            </select>
                            @error('comuna_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>   
                        <!-- Ciudad -->
                        <div class="form-group row">
                            <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
                            <div class="col-md-6">
                            <select id="ciudad_id" class="default-selects form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" required autocomplete="ciudad_id" autofocus>
                                <option selected="true" value="">Seleccione...</option>
                            </select>
                            @error('ciudad_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                           
                        @include('partials.components.elementos.sede')   

                        <!-- Área -->
                        <div class="form-group row">
                                <label for="area_id" class="col-md-4 col-form-label text-md-right">{{ __('Área') }}</label>
                                <div class="col-md-6">
                                <select id="area_id" class="default-selects form-control @error('area_id') is-invalid @enderror" name="area_id" required autocomplete="area_id" autofocus>
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
                                <input id="nueva_area" type="text" class="new-inputs form-control @error('nueva_area') is-invalid @enderror" name="nueva_area" value="{{ old('nueva_area') }}" required autocomplete="nueva_area" autofocus>
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
                                <select id="cargo_id" class="default-selects form-control @error('cargo_id') is-invalid @enderror" name="cargo_id" required autocomplete="cargo_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($cargos as $c)
                                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
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
                                <input id="nuevo_cargo" type="text" class="new-inputs form-control @error('nuevo_cargo') is-invalid @enderror" name="nuevo_cargo" value="{{ old('nuevo_cargo') }}" required autocomplete="nuevo_cargo" autofocus>
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
                                <select id="estado_socio_id" class="default-selects form-control @error('estado_socio_id') is-invalid @enderror" name="estado_socio_id" required autocomplete="estado_socio_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($estados as $e)
                                    <option value="{{ $e->id }}">{{ $e->nombre }}</option>
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
                                <input id="nuevo_estado_socio" type="text" class="new-inputs form-control @error('nuevo_estado_socio') is-invalid @enderror" name="nuevo_estado_socio" value="{{ old('nuevo_estado_socio') }}" required autocomplete="nuevo_estado_socio" autofocus>
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
                                <select id="nacionalidad_id" class="default-selects form-control @error('nacionalidad_id') is-invalid @enderror" name="nacionalidad_id" required autocomplete="nacionalidad_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($nacionalidades as $n)
                                    <option value="{{ $n->id }}">{{ $n->nombre }}</option>
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
                                <input id="nueva_nacionalidad" type="text" class="new-inputs form-control @error('nueva_nacionalidad') is-invalid @enderror" name="nueva_nacionalidad" value="{{ old('nueva_nacionalidad') }}" required autocomplete="nueva_nacionalidad" autofocus>
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
                                    {{ __('Incorporar') }}
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
