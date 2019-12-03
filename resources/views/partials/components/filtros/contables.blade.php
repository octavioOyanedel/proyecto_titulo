    <div class="float-left">
        <div class="input-group mb-2 mr-sm-2">
            <span><b>{{ $total_consulta }}</b>@if($total_consulta === 1) {{ 'Registro encontrado.' }} @else {{ 'Registros encontrados.' }} @endif &nbsp;</span>
            <a title="Resetear listado." class="mr-2" href="{{ route('contables.index') }}">|<b>Resetear</b>|</a>
            <a title="Exportar listado." class="mr-2" href="{{ route('listado_contables') }}">|<b>Exportar Excel</b>|</a>            
        </div>                                                                            
    </div>   
    <form class="form-inline float-right" method="GET" action="{{ route('contables.index') }}">
     
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
                <option value="fecha" @if(request('columna') === 'fecha') {{ 'selected' }} @endif>Fecha de solicitud</option>
                <option value="tipo_registro_contable_id" @if(request('columna') === 'tipo_registro_contable_id') {{ 'selected' }} @endif>Tipo de registro</option>           
                <option value="numero_registro" @if(request('columna') === 'numero_registro') {{ 'selected' }} @endif>Numero de registro</option>
                <option value="cheque" @if(request('columna') === 'cheque') {{ 'selected' }} @endif>Cheque</option>
                <option value="Monto" @if(request('columna') === 'Monto') {{ 'selected' }} @endif>Monto</option>   
                <option value="concepto_id" @if(request('columna') === 'concepto_id') {{ 'selected' }} @endif>Concepto</option>                   
            </select>
        </div>

        <div class="input-group mb-2 mr-sm-2">
            <select name="orden" id="orden" class="form-control form-control-sm">
                <option value="" selected>Orden</option>
                <option value="ASC" @if(request('orden') === 'ASC') {{ 'selected' }} @endif>Ascendente</option>
                <option value="DESC" @if(request('orden') === 'DESC') {{ 'selected' }} @endif>Descendente</option>                
            </select>
        </div>

        <input type="hidden" name="buscar_registro" value="{{ request('buscar_registro') }}">

        <div class="input-group mb-2 mr-sm-2">
            <button type="submit" id="filtrar" class="btn btn-sm btn-secondary">Filtrar</button>
        </div> 

    </form>