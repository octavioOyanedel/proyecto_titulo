@if(strpos(request()->path(), 'contables') >= 0)        
    <script src="{{ asset('js/tablas/data_table_contables.js') }}" defer></script>

@endif

@if(request()->path() === 'contables/create')
    <script src="{{ asset('js/ajax/validar_cheque_contable_create.js') }}" defer></script>
    <script src="{{ asset('js/ajax/validar_numero_registro_create.js') }}" defer></script>
@endif

@if(request()->path() === 'filtro_contables')
    
@endif

@if(request()->path() === 'mantenedor-contables')
    <script src="{{ asset('js/tablas/data_table_cuentas.js') }}" defer></script>
    <script src="{{ asset('js/tablas/data_table_conceptos.js') }}" defer></script>
    <script src="{{ asset('js/tablas/data_table_asociados.js') }}" defer></script>
    <script src="{{ asset('js/tablas/data_table_bancos.js') }}" defer></script>
@endif