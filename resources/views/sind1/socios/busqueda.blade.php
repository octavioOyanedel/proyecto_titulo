@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Búsqueda Filtrada Socios</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf
                        <!-- Fecha nacimiento inicio -->
                        <div class="text-center alert alert-secondary" role="alert">Fecha de nacimiento</div>
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
                        <div class="text-center alert alert-secondary" role="alert">Fecha de ingreso a PUCV</div>
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
                        <div class="text-center alert alert-secondary" role="alert">Fecha de ingreso a SIND1</div>
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

                        @include('partials.components.elementos.socio.genero')
                        
                        @include('partials.components.elementos.socio.comuna') 

                        @include('partials.components.elementos.socio.ciudad')

                        @include('partials.components.elementos.socio.direccion')

                        @include('partials.components.elementos.socio.sede')    

                        @include('partials.components.elementos.socio.area')   
             
                        @include('partials.components.elementos.socio.cargo')
 
                        @include('partials.components.elementos.socio.situacion')

                        @include('partials.components.elementos.socio.nacion')   
                                        
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
