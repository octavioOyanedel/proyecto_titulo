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

@switch(request()->path())
    {{-- crear --}}
    @case('contables/create')
        <script src="{{ asset('js/ajax/validar_cheque_contable_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_numero_registro_create.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('mantenedor-contables')
        <script src="{{ asset('js/tablas/data_table_cuentas.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_conceptos.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_asociados.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_bancos.js') }}" defer></script>

    @break
    {{-- listar --}}
    @case('contables')
        <script src="{{ asset('js/tablas/data_table_contables.js') }}" defer></script>
    @break
    {{-- filtrar --}}
    @case('filtro_contables')

    @break    
    @default
@endswitch