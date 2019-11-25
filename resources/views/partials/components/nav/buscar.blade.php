<!-- formulario búsqueda socio-->
<div id="buscador-socio" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('home') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de socio(s) por medio de: Nombre (primer o segundo nombre), apellido (paterno o materno), género (varón o dama), Rut (Ej. 11222333k), Fecha ingreso Sind1 (Ej. 01-01-2019), Número de socio, Correo, Celular y Anexo, Sede (Ej. casa central), Área (Ej. abastecimiento), Cargo (Ej. secretaria).">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_socio" placeholder="Buscar socio(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>


<!-- formulario búsqueda prestamo-->
<div id="buscador-prestamo" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('prestamos.index') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de préstamo(s) por medio de: Estado préstamo (vigente, pagado, atrasado), Rut (Ej. 11222333k), Fecha de solicitud (Ej. 01-01-2019), Número de egreso, Número de cuenta (Ej. 001-001-1111), Método de pago (depósito o descuento por planilla), Cheque y Monto (Ej. 20000).">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_prestamo" placeholder="Buscar prestamo(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario búsqueda registros contables-->
<div id="buscador-contable" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('contables.index') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de registro(s) contable(s) por medio de: Fecha de solicitud (Ej. 01-01-2019), Tipo de registro (egreso o ingreso), Número de registro, Cheque, Monto (Ej. 20000) y Concepto (Ej. préstamo).">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_registro" placeholder="Buscar registro(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario búsqueda log sistema-->
<div id="buscador-historial" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('historial.index') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de registro(s) por medio de: Correo, Fecha (Ej. 01-01-2019), Acción (Cualquiera de las palabras incluidas en esta celda Ej. -concepto- depósito, -cheque- 996699660, -nombre- Juan Soto, o -rut- con formato 11.222.333-k), IP, Navegador y Sistema operativo.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_historial" placeholder="Buscar registro(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario búsqueda usuarios-->
<div id="buscador-usuario" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('usuarios.index') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de usuario(s) por medio de: Nombre (primer o segundo nombre), apellido (paterno o materno), Correo y Rol (Ej. usuario).">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_usuario" placeholder="Buscar usuario(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- mantenedores -->

<!-- formulario sedes-->
<div id="buscador-sede" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_socio_sede') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de sede(s) por medio de: Sede.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_sede" placeholder="Buscar sede(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario areas-->
<div id="buscador-area" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_socio_area') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de área(s) por medio de: Sede y Área.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_area" placeholder="Buscar área(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

 <!-- formulario cargos-->
<div id="buscador-cargo" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_socio_cargo') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de cargo(s) por medio de: Cargo.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_cargo" placeholder="Buscar cargo(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario estados socio-->
<div id="buscador-estado-socio" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_socio_estado') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de estado por medio de: Estado socio.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_estado_socio" placeholder="Buscar estado" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>   
<!-- formulario nacionalidad-->
<div id="buscador-nacionalidad" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_socio_nacionalidad') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de nacionalidad por medio de: Nacionalidad.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_nacionalidad" placeholder="Buscar nacionalidad" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario parentesco-->
<div id="buscador-parentesco" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_carga_parentesco') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de parentesco por medio de: Parentesco.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_parentesco" placeholder="Buscar parentesco" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

 <!-- formulario nivel educacional-->
<div id="buscador-nivel" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_estudio_nivel') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de nivel educacional por medio de: Nivel educacional.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_nivel" placeholder="Buscar nivel educacional" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario institucion-->
<div id="buscador-institucion" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_estudio_institucion') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de institución(es) por medio de: Institución.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_institucion" placeholder="Buscar institución(es)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>    

<!-- formulario estado educacion-->
<div id="buscador-estado-nivel" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_estudio_estado_nivel') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de estado(s) nivel académico por medio de: Estado nivel acádemico.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_estado_nivel" placeholder="Buscar estado(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario titulo-->
<div id="buscador-titulo" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_estudio_titulo') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de título(s) por medio de: Título.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_titulo" placeholder="Buscar título(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

 <!-- formulario forma pago-->
<div id="buscador-pago" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_prestamo_forma_pago') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de forma de pago por medio de: Forma de pago.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_pago" placeholder="Buscar forma de pago" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario cuenta bamcaria-->
<div id="buscador-cuenta" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_contable_cuenta') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de cuenta(s) bancaria(s) por medio de: Número de cuenta (Ej. 001-001-1111).">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_cuenta" placeholder="Buscar cuenta(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>   
<!-- formulario banco-->
<div id="buscador-banco" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_contable_banco') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de banco por medio de: Banco.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_banco" placeholder="Buscar banco" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario concepto-->
<div id="buscador-concepto" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_contable_concepto') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de concepto(s) por medio de: Concepto y Tipo de egreso (ingreso o egreso).">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_concepto" placeholder="Buscar concepto(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

 <!-- formulario tipo cuenta-->
<div id="buscador-tipo-cuenta" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_contable_tipo_cuenta') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de tipo de cuenta bancaria por medio de: Tipo de cuenta.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_tipo_cuenta" placeholder="Buscar tipo de cuenta" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>

<!-- formulario asociado-->
<div id="buscador-asociado" class="d-none">
    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('mantenedor_contable_asociado') }}">
        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle mr-2 pb-0" data-container="body" data-toggle="popover" data-placement="left" data-content="Búsqueda de asociado(s) por medio de: Concepto y Nombre de asociado.">?</button>
        <input class="form-control mr-sm-2" type="search" name="buscar_asociado" placeholder="Buscar asociado(s)" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
</div>  