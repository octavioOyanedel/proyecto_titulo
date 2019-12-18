@isset($registroContable)
    @switch(request()->path())
        {{-- editar --}}
        @case('contables/'.$registroContable->id.'/edit')
            <script src="{{ asset('js/ajax/validar_cheque_contable_create.js') }}" defer></script>
            <script src="{{ asset('js/ajax/validar_numero_registro_create.js') }}" defer></script>
            <script src="{{ asset('js/switch_numero_registro.js') }}" defer></script>
            <script src="{{ asset('js/ajax/cargar_conceptos.js') }}" defer></script>
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
        @break
        {{-- mostrar --}}
        @case('contables/'.$registroContable->id)
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
        @break
        @default
    @endswitch
@endisset

@isset($registro)
    @switch(request()->path())
        {{-- editar --}}
        @case('contables/'.$registro->id.'/edit')
            <script src="{{ asset('js/ajax/validar_cheque_contable_create.js') }}" defer></script>
            <script src="{{ asset('js/ajax/validar_numero_registro_create.js') }}" defer></script>
            <script src="{{ asset('js/switch_numero_registro.js') }}" defer></script>
            <script src="{{ asset('js/ajax/cargar_conceptos.js') }}" defer></script>
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
        @break
        {{-- mostrar --}}
        @case('contables/'.$registro->id)
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
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
            <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
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
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('mantenedor_contable_tipo_cuenta')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @case('mantenedor_contable_banco')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @case('mantenedor_contable_concepto')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @case('mantenedor_contable_tipo_registro')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @case('mantenedor_contable_asociado')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @case('mantenedor_contable_cuenta')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    {{-- listar --}}
    @case('contables')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    {{-- filtrar --}}
    @case('filtro_contables_form')
        <script src="{{ asset('js/ajax/cargar_conceptos.js') }}" defer></script>
        <script src="{{ asset('js/switch_filtro_contables.js') }}" defer></script>
    @break
    {{-- crear --}}
    @case('cuentas/create')
        <script src="{{ asset('js/ajax/validar_numero_cuenta_create.js') }}" defer></script>
    @break
    {{-- anular --}}
    @case('anular_registro_form')
        {{-- <script src="{{ asset('js/ajax/validar_cheque_contable_anular_create.js') }}" defer></script> --}}
        {{-- <script src="{{ asset('js/ajax/validar_numero_registro_anular_create.js') }}" defer></script> --}}
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    @default
@endswitch

