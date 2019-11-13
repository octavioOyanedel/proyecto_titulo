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

@if(session()->has('agregar-usuario'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Usuario registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Mantenedores --}}

@if(session()->has('agregar-sede'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Sede registrada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-sede'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Sede editada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-sede') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Sede eliminada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-area'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Área registrada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-area'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Área editada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-area') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Área eliminada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-cargo'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Cargo registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-cargo'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Cargo editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-cargo') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Cargo eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-estado-socio'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Estado socio registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-estado-socio'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Estado socio editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-estado-socio') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Estado socio eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-nacionalidad'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Nacionalidad registrada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-nacionalidad'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Nacionalidad editada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-nacionalidad') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Nacionalidad eliminada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-parentesco'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Parentesco registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-parentesco'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Parentesco editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-parentesco') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Parentesco eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-nivel-educacional'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Nivel educacional registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-nivel-educacional'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Nivel educacional editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-nivel-educacional') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Nivel educacional eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-institucion'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Institución registrada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-institucion'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Institución editada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-institucion') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Institución eliminada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-estado-nivel-educacional'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Estado nivel educacional registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-estado-nivel-educacional'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Estado nivel educacional editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-estado-nivel-educacional') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Estado nivel educacional eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-titulo'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Título registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-titulo'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Título editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-titulo') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Título eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-forma-pago'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Forma de pago registrada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-forma-pago'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Forma de pago editada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-forma-pago') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Forma de pago eliminada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-cuenta'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Cuenta registrada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-cuenta'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Cuenta editada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-cuenta') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Cuenta eliminada con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-concepto'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Concepto registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-concepto'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Concepto editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-concepto') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Concepto eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-asociado'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Asociado registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-asociado'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Asociado editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-asociado') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Asociado eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('agregar-banco'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Banco registrado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('editar-banco'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Banco editado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('eliminar-banco') || app('request')->input('e') === '1')
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Banco eliminado con éxito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif