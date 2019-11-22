<div>
    <form class="form-inline float-right" method="GET" action="{{ route('home') }}">

        <div class="input-group mb-2 mr-sm-2">
            <select name="registros" id="registro" class="form-control form-control-sm">
                <option value="15" selected>N° Registros</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <div class="input-group mb-2 mr-sm-2">
            <select name="columna" id="columna" class="form-control form-control-sm">
                <option value="fecha_sind1" selected>Columna</option>
                <option value="nombre1">Primer nombre</option>
                <option value="apellido1">Apellido paterno</option>
                <option value="genero">Género</option>
                <option value="rut">Rut</option>
                <option value="fecha_sind1">Fecha incorporación sind1</option>
                <option value="numero_socio">N° Socio</option>
                <option value="correo">Correo</option>
                <option value="anexo">Anexo</option>
                <option value="celular">Celular</option>
                <option value="sede_id">Sede</option>                
                <option value="area_id">Área</option>
                <option value="cargo_id">Cargo</option>                             
            </select>
        </div>

        <div class="input-group mb-2 mr-sm-2">
            <select name="orden" id="orden" class="form-control form-control-sm">
                <option value="DESC" selected>Orden</option>
                <option value="ASC">Ascendente</option>
                <option value="DESC">Descendente</option>                
            </select>
        </div>

        <button type="submit" id="filtrar" class="btn btn-sm btn-secondary mb-2" disabled>Filtrar</button> 

    </form>
</div> 