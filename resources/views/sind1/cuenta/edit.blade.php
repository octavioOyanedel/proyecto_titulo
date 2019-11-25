@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="text-center card-header"><h3 class="mb-0">Editar Cuanta Bancaria</h3></div>

                <div class="card-body shadow-lg p-3 bg-white rounded">

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('cuentas.update',$cuenta) }}">   

                        @csrf
                        @method('PUT')

                        @include('partials.components.elementos.contable.numero_cuenta')
                        @include('partials.components.elementos.contable.tipos_cuenta')
                        @include('partials.components.elementos.contable.bancos')    

                        <input type="hidden" name="numero_original" value="{{ $cuenta->numero }}">            

                        <!-- Botón submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
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