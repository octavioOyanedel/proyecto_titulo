<div class="tab-pane fade show active" id="nav-sede" role="tabpanel" aria-labelledby="nav-sede-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('sedes.create') }}">Agregar nueva sede</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-sedes">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Sede</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($sedes as $s)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar sede"><a class="text-secondary" href="{{ route('sedes.edit',$s) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar sede"><a class="text-danger" data-toggle="modal" data-target="#eliminar_sede" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $s->nombre }}</td>
                    </tr>
                @endforeach 
            </tbody>                                 
        </table>
    </div>                                
</div>