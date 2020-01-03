@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Búsqueda Filtrada Socios</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="GET" action="{{ route('filtro_socios') }}">

                        <div class="form-check text-center mb-3">
                            <input class="form-check-input" type="radio" name="desvinculados" id="radio_activos" value="activos" checked="">
                            <label class="form-check-label" for="radio_activos">
                            Mostrar solo socios activos.
                            </label>
                        </div>

                        <div class="form-check text-center mb-3">
                            <input class="form-check-input" type="radio" name="desvinculados" id="radio_incluir" value="incluir">
                            <label class="form-check-label" for="radio_incluir">
                            Incluir socios descvinculados.
                            </label>
                        </div>

                        <div class="form-check text-center mb-3">
                            <input class="form-check-input" type="radio" name="desvinculados" id="radio_solo" value="solo">
                            <label class="form-check-label" for="radio_solo">
                            Mostrar solo socios desvinculados.
                            </label>
                        </div>
                        <!-- Fecha nacimiento inicio -->
                        <div class="text-center alert alert-secondary" role="alert"><b>Fecha de nacimiento</b></div>
                        <div class="form-group row">
                            <label for="fecha_nac_ini" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac_ini" type="date" class="form-control @error('fecha_nac_ini') is-invalid @enderror" name="fecha_nac_ini" value="{{ old('fecha_nac_ini') }}" autocomplete="fecha_nac_ini" autofocus>
                                @error('fecha_nac_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Fecha nacimiento fin -->
                        <div class="form-group row">
                            <label for="fecha_nac_fin" class="col-md-4 col-form-label text-md-right">{{ __('Término') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_nac_fin" type="date" class="form-control @error('fecha_nac_fin') is-invalid @enderror" name="fecha_nac_fin" value="{{ old('fecha_nac_fin') }}" autocomplete="fecha_nac_fin" autofocus>
                                @error('fecha_nac_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>     
                        <hr>    
                        <div class="text-center alert alert-secondary" role="alert"><b>Fecha de ingreso a PUCV</b></div>
                        <!-- Fecha ingreso pucv inicio -->
                        <div class="form-group row">
                            <label for="fecha_pucv_ini" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_pucv_ini" type="date" class="form-control @error('fecha_pucv_ini') is-invalid @enderror" name="fecha_pucv_ini" value="{{ old('fecha_pucv_ini') }}" autocomplete="fecha_pucv_ini" autofocus>
                                @error('fecha_pucv_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        <!-- Fecha ingreso pucv fin -->
                        </div>
                            <div class="form-group row">
                            <label for="fecha_pucv_fin" class="col-md-4 col-form-label text-md-right">{{ __('Término') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_pucv_fin" type="date" class="form-control @error('fecha_pucv_fin') is-invalid @enderror" name="fecha_pucv_fin" value="{{ old('fecha_pucv_fin') }}" autocomplete="fecha_pucv_fin" autofocus>
                                @error('fecha_pucv_fin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>  
                        <hr>
                        <div class="text-center alert alert-secondary" role="alert"><b>Fecha de ingreso a SIND1</b></div>
                        <!-- Fecha ingreso sind1 inicio -->
                        <div class="form-group row">
                            <label for="fecha_sind1_ini" class="col-md-4 col-form-label text-md-right">{{ __('Inicio') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_sind1_ini" type="date" class="form-control @error('fecha_sind1_ini') is-invalid @enderror" name="fecha_sind1_ini" value="{{ old('fecha_sind1_ini') }}" autocomplete="fecha_sind1_ini" autofocus>
                                @error('fecha_sind1_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Fecha ingreso sind1 fin -->
                        <div class="form-group row">
                            <label for="fecha_sind1_fin" class="col-md-4 col-form-label text-md-right">{{ __('Fin') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_sind1_fin" type="date" class="form-control @error('fecha_sind1_fin') is-invalid @enderror" name="fecha_sind1_fin" value="{{ old('fecha_sind1_fin') }}" autocomplete="fecha_sind1_fin" autofocus>
                                @error('fecha_sind1_fin')
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
