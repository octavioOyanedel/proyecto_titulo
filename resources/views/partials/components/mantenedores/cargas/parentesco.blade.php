<div class="tab-pane fade show active" id="nav-parentesco" role="tabpanel" aria-labelledby="nav-parentesco-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('parentescos.create') }}">Agregar Parentesco</a> 

    @if($parentescos->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-parentescos">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="" scope="col">Parentesco</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($parentescos as $p)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar parentesco"><a class="text-secondary" href="{{ route('parentescos.edit', $p) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar parentesco"><a class="text-danger" href="{{ route('parentescos.show', $p) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $p->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>