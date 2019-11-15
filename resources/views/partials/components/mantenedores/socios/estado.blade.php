<div class="tab-pane fade" id="nav-estado" role="tabpanel" aria-labelledby="nav-estado-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('situaciones.create') }}">Agregar Estado</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-estados">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Estado</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($estados as $e)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar estado socio"><a class="text-secondary" href="{{ route('situaciones.edit',$e->id) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar estado socio"><a data-id="{{ $e->id }}" class="enlace_eliminar text-danger" data-toggle="modal" data-target="#eliminar_estado_socio" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $e->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                       
</div>