@isset($prestamo)
    @switch(request()->path())
        {{-- editar --}}
        @case('prestamos/'.$prestamo->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('prestamos/'.$prestamo->id)
            <script src="{{ asset('js/switch_estado_deuda.js') }}" defer></script>
        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- crear --}}
    @case('prestamos/create')
        <script src="{{ asset('js/ajax/validar_rut_prestamo_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_numero_egreso_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_cheque_prestamo_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
        <script src="{{ asset('js/switch_pago_cheque.js') }}" defer></script>
        <script src="{{ asset('js/switch_pago_cheque.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('mantenedor_prestamo_forma_pago')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('simulacion')
        <script src="{{ asset('js/switch_estado_deuda.js') }}" defer></script>
    @break
    {{-- listar --}}
    @case('prestamos')
        <script src="{{ asset('js/switch_estado_deuda.js') }}" defer></script>
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>        
    @break
    {{-- filtrar --}}
    @case('filtro_prestamos_form')
        <script src="{{ asset('js/switch_filtro_prestamos.js') }}" defer></script>
    @break
    {{-- filtrar --}}
    @case('filtro_prestamos')
        <script src="{{ asset('js/switch_estado_deuda.js') }}" defer></script>
    @break
    @default
@endswitch 