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
    @case('mantenedor-cargas')
        <script src="{{ asset('js/tablas/data_table_parentescos.js') }}" defer></script>

    @break
    @default
@endswitch