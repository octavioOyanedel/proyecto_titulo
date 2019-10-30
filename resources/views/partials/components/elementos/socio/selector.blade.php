@if(strpos(request()->path(), 'socios') >= 0)        
    <script src="{{ asset('js/tablas/data_table_prestamos_socio.js') }}" defer></script>

@endif

@if(request()->path() === 'socios/create')
	<script src="{{ asset('js/ajax/validar_rut_create.js') }}" defer></script>
	<script src="{{ asset('js/ajax/validar_numero_socio_create.js') }}" defer></script>
	<script src="{{ asset('js/ajax/validar_correo_create.js') }}" defer></script>
    <script src="{{ asset('js/ajax/cargar_ciudades.js') }}" defer></script>
    <script src="{{ asset('js/ajax/cargar_areas.js') }}" defer></script>
@endif

@if(request()->path() === 'filtro_socio')
    
@endif

@if(request()->path() === 'home')
    <script src="{{ asset('js/tablas/data_table_socios.js') }}" defer></script>
@endif

@if(request()->path() === 'mantenedor-socios')
    <script src="{{ asset('js/tablas/data_table_sedes.js') }}" defer></script>
    <script src="{{ asset('js/tablas/data_table_areas.js') }}" defer></script>
    <script src="{{ asset('js/tablas/data_table_cargos.js') }}" defer></script>
    <script src="{{ asset('js/tablas/data_table_estados.js') }}" defer></script>
    <script src="{{ asset('js/tablas/data_table_naciones.js') }}" defer></script>    
@endif