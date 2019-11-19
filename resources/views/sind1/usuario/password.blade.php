@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center"><h3 class="mb-0">Modificar Contraseña</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">
                    <!-- Formulario -->
                    <form method="POST" action="{{ route('update_passwords') }}">

                        @csrf
                        @include('partials.components.elementos.usuario.pass_actual')
                        @include('partials.components.elementos.usuario.pass')
                        @include('partials.components.elementos.usuario.confirmar_pass')
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        
                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- fin form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection