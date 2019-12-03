    <div class="float-left">
        <div class="input-group mb-2 mr-sm-2">
            <span><b>{{ $total_consulta }}</b>@if($total_consulta === 1) {{ 'Registro encontrado.' }} @else {{ 'Registros encontrados.' }} @endif &nbsp;</span>
            <a title="Resetear listado." class="mr-2" href="{{ route('prestamos.index') }}">|<b>Resetear</b>|</a>
            <a title="Exportar listado." class="mr-2" href="{{ route('listado_prestamos') }}">|<b>Exportar Excel</b>|</a>
        </div>                                                                            
    </div>   
    <form class="form-inline float-right" method="GET" action="{{ route('prestamos.index') }}">
     
        <div class="input-group mb-2 mr-sm-2">
            <select name="registros" id="registro" class="form-control form-control-sm">
                <option value="" selected>N° Registros</option>
                <option value="15" @if(request('registros') === '15') {{ 'selected' }} @endif>15</option>
                <option value="20" @if(request('registros') === '20') {{ 'selected' }} @endif>20</option>
                <option value="50" @if(request('registros') === '50') {{ 'selected' }} @endif>50</option>
                <option value="100" @if(request('registros') === '100') {{ 'selected' }} @endif>100</option>
            </select>
        </div>

        <div class="input-group mb-2 mr-sm-2">
            <select name="columna" id="columna" class="form-control form-control-sm">
                <option value="" selected>Columna</option>
                <option value="socio_id" @if(request('columna') === 'socio_id') {{ 'selected' }} @endif>Nombre socio</option>
                <option value="rut" @if(request('columna') === 'rut') {{ 'selected' }} @endif>Rut</option>                
                <option value="fecha_solicitud" @if(request('columna') === 'fecha_solicitud') {{ 'selected' }} @endif>Fecha solicitud</option>
                <option value="numero_egreso" @if(request('columna') === 'numero_egreso') {{ 'selected' }} @endif>Numero de egreso</option>
                <option value="tipo_cuenta_id" @if(request('columna') === 'tipo_cuenta_id') {{ 'selected' }} @endif>Tipo de cuenta</option>           
                <option value="numero" @if(request('columna') === 'numero') {{ 'selected' }} @endif>Número cuenta</option>      
                <option value="banco_id" @if(request('columna') === 'banco_id') {{ 'selected' }} @endif>Banco</option>
                <option value="forma_pago_id" @if(request('columna') === 'forma_pago_id') {{ 'selected' }} @endif>Forma de pago</option>                                           
                <option value="cheque" @if(request('columna') === 'cheque') {{ 'selected' }} @endif>Cheque</option>
                <option value="monto" @if(request('columna') === 'monto') {{ 'selected' }} @endif>Monto</option>
                <option value="estado_deuda_id" @if(request('columna') === 'estado_deuda_id') {{ 'selected' }} @endif>Estado de préstamo</option>                
            </select>
        </div>

        <div class="input-group mb-2 mr-sm-2">
            <select name="orden" id="orden" class="form-control form-control-sm">
                <option value="" selected>Orden</option>
                <option value="ASC" @if(request('orden') === 'ASC') {{ 'selected' }} @endif>Ascendente</option>
                <option value="DESC" @if(request('orden') === 'DESC') {{ 'selected' }} @endif>Descendente</option>                
            </select>
        </div>

        <input type="hidden" name="buscar_prestamo" value="{{ request('buscar_prestamo') }}">

        <div class="input-group mb-2 mr-sm-2">
            <button type="submit" id="filtrar" class="btn btn-sm btn-secondary">Filtrar</button>
        </div> 

    </form>