<div class="tab-pane fade" id="nav-estado" role="tabpanel" aria-labelledby="nav-estado-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('estados.create') }}">Nuevo estado nivel educacional</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-estados">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Estado Nivel Educacional</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($estados as $e)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar estado nivel educacional"><a class="text-secondary" href="{{ route('estados.edit', $e->id) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar estado nivel educacional"><a class="text-danger" data-toggle="modal" data-target="#eliminar_estado" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $e->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div> 