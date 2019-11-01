@isset($prestamo)
    @switch(request()->path())
        {{-- editar --}}
        @case('prestamos/'.$prestamo->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('prestamos/'.$prestamo->id)

        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- crear --}}
    @case('prestamos/create')
        <script src="{{ asset('js/ajax/validar_rut_prestamo_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_numero_egreso_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_cheque_create.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('mantenedor-prestamos')

    @break
    {{-- listar --}}
    @case('prestamos')

    @break
    {{-- filtrar --}}
    @case('filtro_prestamos')
        <script src="{{ asset('js/ajax/validar_rut_prestamo_create.js') }}" defer></script>
    @break    
    @default
@endswitch