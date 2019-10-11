<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sind1') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/data_table.js') }}" defer></script>
    <script src="{{ asset('js/data_table_acentos.js') }}" defer></script>
    <script src="{{ asset('js/data_table_sedes.js') }}" defer></script>
    <script src="{{ asset('js/data_table_areas.js') }}" defer></script>
    <script src="{{ asset('js/data_table_cargos.js') }}" defer></script>
    <script src="{{ asset('js/data_table_estados.js') }}" defer></script>
    <script src="{{ asset('js/data_table_naciones.js') }}" defer></script>
    <script src="{{ asset('js/data_table_formas_pago.js') }}" defer></script>
    <script src="{{ asset('js/data_table_cuentas.js') }}" defer></script>
    <script src="{{ asset('js/data_table_conceptos.js') }}" defer></script>
    <script src="{{ asset('js/data_table_asociados.js') }}" defer></script>
    <script src="{{ asset('js/data_table_socios.js') }}" defer></script>
    <script src="{{ asset('js/data_table_usuarios.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/data_table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if(auth()->check())
            @include('partials.nav')
        @else

        @endif        

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
