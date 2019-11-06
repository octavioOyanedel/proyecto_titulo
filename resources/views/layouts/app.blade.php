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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/spinner.css') }}" rel="stylesheet">
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

        <main class="py-4 margen-container-nav">
            @yield('content')
        </main>
        
    </div>

</body>

    <script src="{{ asset('js/data_table.js') }}" defer></script>
    <script src="{{ asset('js/data_table_acentos.js') }}" defer></script>
    <script src="{{ asset('js/tablas/data_tables.js') }}" defer></script>

    <!-- selector de js -->

    @include('partials.components.elementos.socio.selector')
    @include('partials.components.elementos.prestamo.selector')
    @include('partials.components.elementos.contable.selector')
    @include('partials.components.elementos.usuario.selector')
    @include('partials.components.elementos.carga.selector')
    @include('partials.components.elementos.estudio.selector')

    <!-- fin selector de js -->
    <script src="{{ asset('js/links_nav.js') }}" defer></script>

</html>
