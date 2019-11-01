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
        <script src="{{ asset('js/tablas/data_table_niveles.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_instituciones.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_estados.js') }}" defer></script>  
        <script src="{{ asset('js/tablas/data_table_titulos.js') }}" defer></script>  
    @break
    @default
@endswitch