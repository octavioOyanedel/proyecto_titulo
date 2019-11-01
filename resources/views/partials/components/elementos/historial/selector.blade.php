@switch(request()->path())
    {{-- listar --}}
    @case('historial')
        <script src="{{ asset('js/tablas/data_table_historial.js') }}" defer></script>
    @break
    {{-- filtrar --}}
    @case('filtro_contables')

    @break    
    @default
@endswitch