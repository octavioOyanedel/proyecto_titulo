@isset($carga)
    @switch(request()->path())
        {{-- editar --}}
        @case('cargas/'.$carga->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('cargas/'.$carga->id)

        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- mantenedor --}}
    @case('mantenedor_cargas')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>
    @break
    {{-- crear --}}
    @case('cargas/create/'.request()->route()->id)
        <script src="{{ asset('js/ajax/validar_rut_carga_create.js') }}" defer></script>
    @break
    @default
@endswitch