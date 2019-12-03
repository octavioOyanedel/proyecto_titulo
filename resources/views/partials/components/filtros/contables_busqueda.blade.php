    <div class="float-left">
        <div class="input-group mb-2 mr-sm-2">
            <span><b>{{ $total_consulta }}</b>@if($total_consulta === 1) {{ 'Registro encontrado.' }} @else {{ 'Registros encontrados.' }} @endif &nbsp;</span>
            <a title="Resetear listado." class="mr-2" href="{{ route('contables.index') }}">|<b>Resetear</b>|</a>
            <a title="Exportar listado." class="mr-2" href="{{ route('listado_contables_filtro',[
                'fecha_solicitud_ini' => $fecha_solicitud_ini,
                'fecha_solicitud_fin' => $fecha_solicitud_fin,
                'monto_ini' => $monto_ini,
                'monto_fin' => $monto_fin,
                'tipo_registro_contable_id' => $tipo_registro_contable_id,
                'cuenta_id' => $cuenta_id,
                'concepto_id' => $concepto_id,
                'socio_id' => $socio_id,
                'asociado_id' => $asociado_id,
                'detalle' => $detalle
            ]) }}">|<b>Exportar Excel</b>|</a>                           
        </div>                                                                            
    </div>   
    <form class="form-inline float-right" method="GET" action="{{ route('filtro_contables') }}">
     
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

        <input type="hidden" name="fecha_solicitud_ini" value="{{ request('fecha_solicitud_ini') }}">
        <input type="hidden" name="fecha_solicitud_fin" value="{{ request('fecha_solicitud_fin') }}">
        <input type="hidden" name="monto_ini" value="{{ request('monto_ini') }}">
        <input type="hidden" name="monto_fin" value="{{ request('monto_fin') }}">
        <input type="hidden" name="tipo_registro_contable_id" value="{{ request('tipo_registro_contable_id') }}">
        <input type="hidden" name="cuenta_id" value="{{ request('cuenta_id') }}">
        <input type="hidden" name="concepto_id" value="{{ request('concepto_id') }}">
        <input type="hidden" name="socio_id" value="{{ request('socio_id') }}">
        <input type="hidden" name="asociado_id" value="{{ request('asociado_id') }}">
        <input type="hidden" name="detalle" value="{{ request('detalle') }}">

        <div class="input-group mb-2 mr-sm-2">
            <button type="submit" id="filtrar" class="btn btn-sm btn-secondary">Filtrar</button>
        </div> 

    </form>