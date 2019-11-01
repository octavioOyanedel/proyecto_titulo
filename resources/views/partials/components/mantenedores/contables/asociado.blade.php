<div class="tab-pane fade" id="nav-asociado" role="tabpanel" aria-labelledby="nav-asociado-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('asociados.create') }}">Nuevo asociado</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-asociados">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Asociado</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($asociados as $a)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar asociado"><a class="text-secondary" href="{{ route('asociados.edit', $a) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar asociado"><a class="text-danger" data-toggle="modal" data-target="#eliminar_asociado" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $a->concepto }}, {{ $a->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div> 