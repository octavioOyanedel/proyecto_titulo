    <div class="float-left">
        <div class="input-group mb-2 mr-sm-2">
            <span><b>{{ $total_consulta }}</b>@if($total_consulta === 1) {{ 'Registro encontrado.' }} @else {{ 'Registros encontrados.' }} @endif &nbsp;</span>
            <a title="Resetear listado." class="mr-2" href="{{ route('cargas.index') }}">|<b>Resetear</b>|</a>
                @if(request('nombre') != null)
                    <a title="Exportar listado." class="mr-2" href="{{ route('estadistica_carga_excel',[
                        'nombre' => $nombre
                    ]) }}">|<b>Exportar Excel</b>|</a>
                @else
                    <a title="Exportar listado." class="mr-2" href="">|<b>Exportar Excel</b>|</a>
                @endif

        </div>
    </div>
    <form class="form-inline float-right" method="GET" action="{{ route('listado_cargas_estadistica') }}">
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
                <option value="nombre1" @if(request('columna') === 'nombre1') {{ 'selected' }} @endif>Primer nombre (carga)</option>
                <option value="apellido1" @if(request('columna') === 'apellido1') {{ 'selected' }} @endif>Apellido paterno (carga)</option>
                <option value="rut" @if(request('columna') === 'rut') {{ 'selected' }} @endif>Rut (carga)</option>
                <option value="fecha_nac" @if(request('columna') === 'fecha_nac') {{ 'selected' }} @endif>Fecha nacimiento</option>
                <option value="parentesco_id" @if(request('columna') === 'parentesco_id') {{ 'selected' }} @endif>Parentesco</option>
            </select>
        </div>

        <div class="input-group mb-2 mr-sm-2">
            <select name="orden" id="orden" class="form-control form-control-sm">
                <option value="" selected>Orden</option>
                <option value="ASC" @if(request('orden') === 'ASC') {{ 'selected' }} @endif>Ascendente</option>
                <option value="DESC" @if(request('orden') === 'DESC') {{ 'selected' }} @endif>Descendente</option>
            </select>
        </div>
            <input type="hidden" name="nombre" value="{{ request('nombre') }}">
        <div class="input-group mb-2 mr-sm-2">
            <button type="submit" id="filtrar" class="btn btn-sm btn-secondary">Filtrar</button>
        </div>

    </form>
