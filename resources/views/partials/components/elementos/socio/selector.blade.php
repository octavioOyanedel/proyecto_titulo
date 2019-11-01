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

        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- home --}}
    @case('home')

    @break
    {{-- crear --}}
    @case('socios/create')
        <script src="{{ asset('js/ajax/validar_rut_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_numero_socio_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_correo_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_ciudades.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_areas.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('mantenedor-socios')

    @break
    {{-- filtro socios --}}
    @case('filtro_socios')
        <script src="{{ asset('js/ajax/cargar_ciudades.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_areas.js') }}" defer></script>
    @break
    @default
@endswitch