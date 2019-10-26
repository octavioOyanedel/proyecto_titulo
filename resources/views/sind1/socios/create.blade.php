@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Incorporar Socio</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="">
                        @csrf

                        @include('partials.components.elementos.socio.nombre1') 

                        @include('partials.components.elementos.socio.nombre2') 

                        @include('partials.components.elementos.socio.apellido1') 

                        @include('partials.components.elementos.socio.apellido2') 

                        @include('partials.components.elementos.socio.rut') 

                        @include('partials.components.elementos.socio.genero') 

                        @include('partials.components.elementos.socio.fecha_nac') 

                        @include('partials.components.elementos.socio.celular') 
  
                        @include('partials.components.elementos.socio.correo') 

                        @include('partials.components.elementos.socio.direccion') 

                        @include('partials.components.elementos.socio.fecha_pucv') 

                        @include('partials.components.elementos.socio.anexo') 

                        @include('partials.components.elementos.socio.numero_socio') 

                        @include('partials.components.elementos.socio.fecha_sind1')

                        @include('partials.components.elementos.socio.comuna')

                        @include('partials.components.elementos.socio.ciudad')
                           
                        @include('partials.components.elementos.socio.sede')   

                        @include('partials.components.elementos.socio.area')  

                        @include('partials.components.elementos.socio.cargo')
 
                        @include('partials.components.elementos.socio.situacion')

                        @include('partials.components.elementos.socio.nacion')
                           
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
