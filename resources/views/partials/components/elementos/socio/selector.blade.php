@if(strpos(request()->path(), 'socios') >= 0)        
    <script src="{{ asset('js/tablas/data_table_prestamos_socio.js') }}" defer></script>

@endif

@if(request()->path() === 'socios/create')
	<script src="{{ asset('js/ajax/validar_rut_create.js') }}" defer></script>
	<script src="{{ asset('js/ajax/validar_numero_socio_create.js') }}" defer></script>
	<script src="{{ asset('js/ajax/validar_correo_create.js') }}" defer></script>
@endif

@if(request()->path() === 'filtro_socio')
    
@endif

@if(request()->path() === 'home')
    <script src="{{ asset('js/tablas/data_table_socios.js') }}" defer></script>
@endif