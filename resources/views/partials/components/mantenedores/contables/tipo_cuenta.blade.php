<div class="tab-pane fade" id="nav-tipo-cuenta" role="tabpanel" aria-labelledby="nav-tipo-cuenta-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('tipos_cuentas.create') }}">Agregar Tipo de Cuenta</a> 

    @if($tipos_cuenta->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-cuentas">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="" scope="col">Tipo cuenta</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($tipos_cuenta as $t)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar tipo de cuenta"><a class="text-secondary" href="{{ route('tipos_cuentas.edit', $t->id) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar tipo de cuenta"><a class="text-danger" href="{{ route('tipos_cuentas.show', $t->id) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $t->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div> 