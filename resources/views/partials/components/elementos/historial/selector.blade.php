@switch(request()->path())
    {{-- listar --}}
    @case('historial')

    @break
    {{-- filtrar --}}
    @case('filtro_contables')

    @break    
    @default
@endswitch