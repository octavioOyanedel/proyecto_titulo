@isset($usuario)
    @switch(request()->path())
        {{-- editar --}}
        @case('usuarios/'.$usuario->id.'/edit')

        @break
        {{-- mostrar --}}
        @case('usuarios/'.$usuario->id)

        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- crear --}}
    @case('register')
    	<script src="{{ asset('js/ajax/validar_correo_create.js') }}" defer></script>
    @break
    {{-- mantenedor --}}
    @case('mantenedor-usuarios')
        <script src="{{ asset('js/tablas/data_table_cuentas.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_conceptos.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_asociados.js') }}" defer></script>
        <script src="{{ asset('js/tablas/data_table_bancos.js') }}" defer></script>

    @break
    {{-- listar --}}
    @case('usuarios')
        <script src="{{ asset('js/tablas/data_table_usuarios.js') }}" defer></script>
    @break
    {{-- filtrar --}}
    @case('filtro_usuarios')

    @break    
    @default
@endswitch