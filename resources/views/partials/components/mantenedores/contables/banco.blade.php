<div class="tab-pane fade" id="nav-banco" role="tabpanel" aria-labelledby="nav-banco-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('bancos.create') }}">Agregar Banco</a> 

    @if($bancos->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-bancos">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="" scope="col">Banco</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($bancos as $b)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar banco"><a class="text-secondary" href="{{ route('bancos.edit', $b) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar banco"><a class="text-danger" href="{{ route('bancos.show', $b) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $b->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>