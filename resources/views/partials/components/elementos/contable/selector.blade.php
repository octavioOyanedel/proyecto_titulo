@isset($registroContable)
    @switch(request()->path())
        {{-- editar --}}
        @case('contables/'.$registroContable->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('contables/'.$registroContable->id)

        @break
        @default
    @endswitch
@endisset

@isset($cuenta)
    @switch(request()->path())
        {{-- editar --}}
        @case('cuentas/'.$cuenta->id.'/edit')
            <script src="{{ asset('js/ajax/validar_numero_cuenta_create.js') }}" defer></script>
        @break
        {{-- mostrar --}}
        @case('cuentas/'.$cuenta->id)

        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- crear --}}
    @case('contables/create')
        <script src="{{ asset('js/ajax/validar_cheque_contable_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_numero_registro_create.js') }}" defer></script>
        <script src="{{ asset('js/switch_numero_registro.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_conceptos.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('mantenedor_contables')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    {{-- listar --}}
    @case('contables')

    @break
    {{-- filtrar --}}
    @case('filtro_contables')

    @break    
    {{-- crear --}}
    @case('cuentas/create')
        <script src="{{ asset('js/ajax/validar_numero_cuenta_create.js') }}" defer></script>
    @break  
    @default
@endswitch