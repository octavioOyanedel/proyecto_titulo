@if(request()->path() === 'register')

@endif

@if(request()->path() === 'mantenedor-usuarios')
	<script src="{{ asset('js/tablas/data_table_usuarios.js') }}" defer></script>
@endif