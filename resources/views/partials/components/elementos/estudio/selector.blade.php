@isset($estudioRealizado)
    @switch(request()->path())
        {{-- editar --}}
        @case('estudios/'.$estudioRealizado->id.'/edit')
            <script src="{{ asset('js/ajax/cargar_instituciones.js') }}" defer></script>
            <script src="{{ asset('js/ajax/cargar_titulos.js') }}" defer></script>            
        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- crear --}}
    @case('estudios/create/'.request()->route()->id)
        <script src="{{ asset('js/ajax/cargar_instituciones.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_titulos.js') }}" defer></script>        
    @break
    {{-- crear --}}
    @case('estudios/create/'.request()->route()->id.'/create')
        <script src="{{ asset('js/ajax/cargar_instituciones.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_titulos.js') }}" defer></script>        
    @break
            {{-- crear --}}
    @case('estudios/create/'.request()->route()->id.'/show')
        <script src="{{ asset('js/ajax/cargar_instituciones.js') }}" defer></script>
        <script src="{{ asset('js/ajax/cargar_titulos.js') }}" defer></script>      
    @break
    @default
@endswitch