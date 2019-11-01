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

    @break
    {{-- listar --}}
    @case('contables')

    @break
    {{-- filtrar --}}
    @case('filtro_contables')

    @break    
    @default
@endswitch