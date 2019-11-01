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

    @break
    @default
@endswitch