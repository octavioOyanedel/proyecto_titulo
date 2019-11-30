@isset($estudio)
    @switch(request()->path())
        {{-- editar --}}
        @case('estudios/'.$estudio->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('estudios/'.$estudio->id)
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- mantenedor --}}
    @case('mantenedor_estudio_nivel')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @case('mantenedor_estudio_institucion')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @case('mantenedor_estudio_estado_nivel')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @case('mantenedor_estudio_titulo')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    {{-- crear --}}
    @case('estudios/create/'.request()->route()->id)
        <script src="{{ asset('js/ajax/cargar_instituciones.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_titulos.js') }}" defer></script>
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break    
    @default
@endswitch

@isset($estudioRealizado)
    @switch(request()->path())
    {{-- editar --}}
        @case('estudios_socio/'.$estudioRealizado->id.'/edit')
            <script src="{{ asset('js/ajax/cargar_instituciones.js') }}" defer></script>
            <script src="{{ asset('js/ajax/cargar_titulos.js') }}" defer></script>
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
        @break
        {{-- mostrar --}}
        @case('estudios/'.$estudioRealizado->id)
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
        @break
        @default
    @endswitch
@endisset

@isset($estudioRealizadoSocio)
    @switch(request()->path())
    {{-- editar --}}
        @case('estudios_socio/'.$estudioRealizadoSocio->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('estudios/'.$estudioRealizadoSocio->id)
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
        @break
        @default
    @endswitch
@endisset