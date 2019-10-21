<div class="tab-pane fade" id="nav-estado" role="tabpanel" aria-labelledby="nav-estado-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('situaciones.create') }}">Agregar nuevo estado</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-estados">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col">Estado</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($estados as $e)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar estado socio"><a class="text-secondary" href="{{ route('situaciones.edit',$e->id) }}"><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar estado socio"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="text-center">{{ $e->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                       
</div>