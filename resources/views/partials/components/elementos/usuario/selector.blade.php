@isset($usuario)
    @switch(request()->path())
        {{-- editar --}}
        @case('usuarios/'.$usuario->id.'/edit')
            <script src="{{ asset('js/ajax/validar_correo_usuario_create.js') }}" defer></script>
        @break
        @default
    @endswitch
@endisset

@switch(request()->path())
    {{-- crear --}}
    @case('register')
    	<script src="{{ asset('js/ajax/validar_correo_usuario_create.js') }}" defer></script>
        <script src="{{ asset('js/ajax/validar_password_create.js') }}" defer></script>     
    @break
    {{-- cambiar password --}}
    @case('passwords')
        <script src="{{ asset('js/ajax/validar_password_create.js') }}" defer></script>
    @break             
    @default
@endswitch 