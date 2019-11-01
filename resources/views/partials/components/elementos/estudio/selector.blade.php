@isset($estudio)
    @switch(request()->path())
        {{-- editar --}}
        @case('estudios/'.$estudio->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('estudios/'.$estudio->id)

        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- mantenedor --}}
    @case('mantenedor-estudios')

    @break
    @default
@endswitch