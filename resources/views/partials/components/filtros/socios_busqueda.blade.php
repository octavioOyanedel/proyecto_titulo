
    <div class="float-left">
        <div class="input-group mb-2 mr-sm-2">
            <span><b>{{ $total_consulta }}</b>@if($total_consulta === 1) {{ 'Registro encontrado.' }} @else {{ 'Registros encontrados.' }} @endif &nbsp;</span>
            <a title="Resetear listado." class="mr-2" href="{{ route('home') }}">|<b>Resetear</b>|</a>
            <a title="Exportar listado." class="mr-2" href="{{ route('listado_socios_filtro',[
                'desvinculados' => $desvinculados,
                'fecha_nac_ini' => $fecha_nac_ini,
                'fecha_nac_fin' => $fecha_nac_fin,
                'fecha_pucv_ini' => $fecha_pucv_ini,
                'fecha_pucv_fin' => $fecha_pucv_fin,
                'fecha_sind1_ini' => $fecha_sind1_ini,
                'fecha_sind1_fin' => $fecha_sind1_fin,
                'genero' => $genero,
                'rut' => $rut,
                'comuna_id' => $comuna_id,
                'ciudad_id' => $ciudad_id,
                'direccion' => $direccion,
                'sede_id' => $sede_id,
                'area_id' => $area_id,
                'cargo_id' => $cargo_id,
                'estado_socio_id' => $estado_socio_id,
                'nacionalidad_id' => $nacionalidad_id
            ]) }}">|<b>Exportar Excel</b>|</a>
        </div>
    </div>
    <form class="form-inline float-right" method="GET" action="{{ route('filtro_socios') }}">
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
                <option value="nombre1" @if(request('columna') === 'nombre1') {{ 'selected' }} @endif>Primer nombre</option>
                <option value="apellido1" @if(request('columna') === 'apellido1') {{ 'selected' }} @endif>Apellido paterno</option>
                <option value="genero" @if(request('columna') === 'genero') {{ 'selected' }} @endif>Género</option>
                <option value="rut" @if(request('columna') === 'rut') {{ 'selected' }} @endif>Rut</option>
                <option value="fecha_sind1" @if(request('columna') === 'fecha_sind1') {{ 'selected' }} @endif>Fecha ingreso sind1</option>
                <option value="numero_socio" @if(request('columna') === 'numero_socio') {{ 'selected' }} @endif>N° Socio</option>
                <option value="correo" @if(request('columna') === 'correo') {{ 'selected' }} @endif>Correo</option>
                <option value="anexo" @if(request('columna') === 'anexo') {{ 'selected' }} @endif>Anexo</option>
                <option value="celular" @if(request('columna') === 'celular') {{ 'selected' }} @endif>Celular</option>
                <option value="sede_id" @if(request('columna') === 'sede_id') {{ 'selected' }} @endif>Sede</option>
                <option value="area_id" @if(request('columna') === 'area_id') {{ 'selected' }} @endif>Área</option>
                <option value="cargo_id" @if(request('columna') === 'cargo_id') {{ 'selected' }} @endif>Cargo</option>
            </select>
        </div>

        <div class="input-group mb-2 mr-sm-2">
            <select name="orden" id="orden" class="form-control form-control-sm">
                <option value="" selected>Orden</option>
                <option value="ASC" @if(request('orden') === 'ASC') {{ 'selected' }} @endif>Ascendente</option>
                <option value="DESC" @if(request('orden') === 'DESC') {{ 'selected' }} @endif>Descendente</option>
            </select>
        </div>

        <input type="hidden" name="fecha_nac_ini" value="{{ request('fecha_nac_ini') }}">
        <input type="hidden" name="fecha_nac_fin" value="{{ request('fecha_nac_fin') }}">
        <input type="hidden" name="fecha_pucv_ini" value="{{ request('fecha_pucv_ini') }}">
        <input type="hidden" name="fecha_pucv_fin" value="{{ request('fecha_pucv_fin') }}">
        <input type="hidden" name="fecha_sind1_ini" value="{{ request('fecha_sind1_ini') }}">
        <input type="hidden" name="fecha_sind1_fin" value="{{ request('fecha_sind1_fin') }}">
        <input type="hidden" name="genero" value="{{ request('genero') }}">
        <input type="hidden" name="rut" value="{{ request('rut') }}">
        <input type="hidden" name="comuna_id" value="{{ request('comuna_id') }}">
        <input type="hidden" name="ciudad_id" value="{{ request('ciudad_id') }}">
        <input type="hidden" name="direccion" value="{{ request('direccion') }}">
        <input type="hidden" name="sede_id" value="{{ request('sede_id') }}">
        <input type="hidden" name="area_id" value="{{ request('area_id') }}">
        <input type="hidden" name="cargo_id" value="{{ request('cargo_id') }}">
        <input type="hidden" name="estado_socio_id" value="{{ request('estado_socio_id') }}">
        <input type="hidden" name="nacionalidad_id" value="{{ request('nacionalidad_id') }}">
        <input type="hidden" name="desvinculados" value="{{ request('desvinculados') }}">

        <div class="input-group mb-2 mr-sm-2">
            <button type="submit" id="filtrar" class="btn btn-sm btn-secondary">Filtrar</button>
        </div>

    </form>
