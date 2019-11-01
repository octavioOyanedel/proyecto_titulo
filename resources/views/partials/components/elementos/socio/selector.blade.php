@isset($socio)
    @switch(request()->path())
        {{-- editar --}}
        @case('socios/'.$socio->id.'/edit')
            <script src="{{ asset('js/ajax/validar_rut_create.js') }}" defer></script>
            <script src="{{ asset('js/ajax/validar_numero_socio_create.js') }}" defer></script>
            <script src="{{ asset('js/ajax/validar_correo_create.js') }}" defer></script>
            <script src="{{ asset('js/ajax/cargar_ciudades.js') }}" defer></script>
            <script src="{{ asset('js/ajax/cargar_areas.js') }}" defer></script>
        @break
        {{-- mostrar --}}
        @case('socios/'.$socio->id)
            <script src="{{ asset('js/tablas/data_table_prestamos_socio.js') }}" defer></script>
        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- home --}}
    @case('home')
        <script src="{{ asset('js/tablas/data_table_socios.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('mantenedor-socios')
        <script src="{{ asset('js/tablas/data_table_sedes.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_areas.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_cargos.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_estados.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_naciones.js') }}" defer></script> 
    @break
    {{-- filtro socios --}}
    @case('filtro_socios')
        <script src="{{ asset('js/ajax/cargar_ciudades.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_areas.js') }}" defer></script>
    @break
    @default
@endswitch