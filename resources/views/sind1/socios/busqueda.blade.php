@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Búsqueda avanzada</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf
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
                        <hr>    
                        <!-- Fecha nacimiento inicio -->
                        <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ old('fecha_nac') }}" required autocomplete="fecha_nac" autofocus>
                                @error('fecha_nac')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Fecha nacimiento fin -->
                        <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('Término') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ old('fecha_nac') }}" required autocomplete="fecha_nac" autofocus>
                                @error('fecha_nac')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>     
                        <hr>                   
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
                        <hr>    
                        <!-- Fecha ingreso pucv inicio -->
                        <div class="form-group row">
                            <label for="fecha_pucv" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_pucv" type="date" class="form-control @error('fecha_pucv') is-invalid @enderror" name="fecha_pucv" value="{{ old('fecha_pucv') }}" required autocomplete="fecha_pucv" autofocus>
                                @error('fecha_pucv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        <!-- Fecha ingreso pucv fin -->
                        </div>
                            <div class="form-group row">
                            <label for="fecha_pucv" class="col-md-4 col-form-label text-md-right">{{ __('Término') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_pucv" type="date" class="form-control @error('fecha_pucv') is-invalid @enderror" name="fecha_pucv" value="{{ old('fecha_pucv') }}" required autocomplete="fecha_pucv" autofocus>
                                @error('fecha_pucv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>  
                        <hr>
                        <!-- Fecha ingreso sind1 inicio -->
                        <div class="form-group row">
                            <label for="fecha_sind1" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_sind1" type="date" class="form-control @error('fecha_sind1') is-invalid @enderror" name="fecha_sind1" value="{{ old('fecha_sind1') }}" required autocomplete="fecha_sind1" autofocus>
                                @error('fecha_sind1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Fecha ingreso sind1 fin -->
                        <div class="form-group row">
                            <label for="fecha_sind1" class="col-md-4 col-form-label text-md-right">{{ __('Fin') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_sind1" type="date" class="form-control @error('fecha_sind1') is-invalid @enderror" name="fecha_sind1" value="{{ old('fecha_sind1') }}" required autocomplete="fecha_sind1" autofocus>
                                @error('fecha_sind1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>                        
                        <hr>
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
                        <!-- Sede -->
                        <div class="form-group row">
                                <label for="sede_id" class="col-md-4 col-form-label text-md-right">{{ __('Sede') }}</label>
                                <div class="col-md-6">
                                <select id="sede_id" class="default-selects form-control @error('sede_id') is-invalid @enderror" name="sede_id" required autocomplete="sede_id" autofocus>
                                    <option selected="true" value="">Seleccione...</option>
                                    @foreach($sedes as $s)
                                    <option value="{{ $s->id }}">{{ $s->nombre }}</option>
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
                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Buscar') }}
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
