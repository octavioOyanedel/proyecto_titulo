@switch(request()->path())
    {{-- crear --}}
    @case('cargas/create/'.request()->route()->id)
        <script src="{{ asset('js/ajax/validar_rut_carga_create.js') }}" defer></script>
    @break
    {{-- crear --}}
    @case('cargas/create/'.request()->route()->id.'/create')
        <script src="{{ asset('js/ajax/validar_rut_carga_create.js') }}" defer></script>
    @break
    {{-- crear --}}
    @case('cargas/create/'.request()->route()->id.'/show')
        <script src="{{ asset('js/ajax/validar_rut_carga_create.js') }}" defer></script>       
    @break
    @default
@endswitch