@if(session()->has('agregar-socio'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Socio incorporado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-carga'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Carga familiar agregada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-estudio'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Estudio realizado agregado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-prestamo'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Préstamo registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('cancelar-deposito'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Préstamo pagado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-registro'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Registro contable almacenado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif