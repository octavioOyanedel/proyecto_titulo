@isset($estudio)
    @switch(request()->path())
        {{-- editar --}}
        @case('estudios/'.$estudio->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('estudios/'.$estudio->id)

        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- mantenedor --}}
    @case('mantenedor-estudios')

    @break
    {{-- crear --}}
    @case('estudios/create/'.request()->route()->id)
        <script src="{{ asset('js/ajax/cargar_instituciones.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_titulos.js') }}" defer></script>
    @break    
    @default
@endswitch