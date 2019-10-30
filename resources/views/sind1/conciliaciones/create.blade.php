@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Generar Conciliación Bancaria</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulario -->
                    <form method="POST" action="{{ route('mostrar_conciliacion') }}">
                        @csrf

                        @include('partials.components.elementos.conciliacion.cuenta')
                        @include('partials.components.elementos.conciliacion.meses')
                        @include('partials.components.elementos.conciliacion.year') 

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}
                                </button>
                            </div>
                        </div>  

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection