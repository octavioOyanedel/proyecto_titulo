@if(request()->path() === 'estudios/create')
    <script src="{{ asset('js/ajax/cargar_instituciones.js') }}" defer></script>
    <script src="{{ asset('js/ajax/cargar_titulos.js') }}" defer></script>
@endif