<div class="tab-pane fade show active" id="nav-cuenta" role="tabpanel" aria-labelledby="nav-cuenta-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('cuentas.create') }}">Agregar Cuenta</a> 

    @if($cuentas->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover data-tables" id="tabla-cuentas">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" title=""></th>
                        <th class="text-center" scope="col" title=""></th>
                        <th class="" scope="col">Cuenta</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($cuentas as $c)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar cuenta"><a class="text-secondary" href="{{ route('cuentas.edit', $c) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar cuenta"><a class="text-danger" href="{{ route('cuentas.show', $c->id) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $c->tipo_cuenta_id }} N° {{ $c->numero }} - {{ $c->banco_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div> 