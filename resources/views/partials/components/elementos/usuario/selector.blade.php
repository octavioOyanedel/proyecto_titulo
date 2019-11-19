@isset($usuario)
    @switch(request()->path())
        {{-- editar --}}
        @case('usuarios/'.$usuario->id.'/edit')
            <script src="{{ asset('js/ajax/validar_correo_usuario_create.js') }}" defer></script>
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
    	<script src="{{ asset('js/ajax/validar_correo_usuario_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_password_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>        
    @break
    {{-- mantenedor --}}
    @case('mantenedor-usuarios')


    @break
    {{-- listar --}}
    @case('usuarios')
        <script src="{{ asset('js/ajax/eliminar_alertas.js') }}" defer></script>      
    @break
    {{-- filtrar --}}
    @case('filtro_usuarios')

    @break
    {{-- cambiar password --}}
    @case('passwords')
        <script src="{{ asset('js/ajax/validar_password_create.js') }}" defer></script>
    @break             
    @default
@endswitch 