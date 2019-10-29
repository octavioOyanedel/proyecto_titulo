@if(strpos(request()->path(), 'prestamos') >= 0)        
    <script src="{{ asset('js/tablas/data_table_prestamos.js') }}" defer></script>

@endif

@if(request()->path() === 'prestamos/create')
    <script src="{{ asset('js/ajax/validar_rut_prestamo_create.js') }}" defer></script>
    <script src="{{ asset('js/ajax/validar_numero_egreso_create.js') }}" defer></script>
    <script src="{{ asset('js/ajax/validar_cheque_create.js') }}" defer></script>

@endif

@if(request()->path() === 'filtro_prestamos')
    
@endif