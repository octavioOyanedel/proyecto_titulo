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

                        @include('partials.components.elementos.ciudad')
                           
                        @include('partials.components.elementos.sede')   

                        @include('partials.components.elementos.area')  

                        @include('partials.components.elementos.cargo')
 
                        @include('partials.components.elementos.situacion')

                        @include('partials.components.elementos.nacion')
                           
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
