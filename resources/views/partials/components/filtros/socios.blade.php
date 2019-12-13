    <div class="float-left">
        <div class="input-group mb-2 mr-sm-2">
            <span><b>{{ $total_consulta }}</b>@if($total_consulta === 1) {{ 'Registro encontrado.' }} @else {{ 'Registros encontrados.' }} @endif &nbsp;</span>
            <a title="Resetear listado." class="mr-2" href="{{ route('home') }}">|<b>Resetear</b>|</a>
                @if(request('buscar_socio') != null)
                    <a title="Exportar listado." class="mr-2" href="{{ route('listado_socios_buscar', ['buscar_socio' => request('buscar_socio')]) }}">|<b>Exportar Excel</b>|</a>
                @else
                    <a title="Exportar listado." class="mr-2" href="{{ route('listado_socios') }}">|<b>Exportar Excel</b>|</a>
                @endif
            
        </div>                                                                            
    </div>        
    <form class="form-inline float-right" method="GET" action="{{ route('home') }}">
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
            <input type="hidden" name="buscar_socio" value="{{ request('buscar_socio') }}">
        <div class="input-group mb-2 mr-sm-2">
            <button type="submit" id="filtrar" class="btn btn-sm btn-secondary">Filtrar</button>
        </div> 

    </form>
