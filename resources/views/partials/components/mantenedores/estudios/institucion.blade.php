<div class="tab-pane fade" id="nav-institucion" role="tabpanel" aria-labelledby="nav-institucion-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('instituciones.create') }}">Agregar Institución</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-instituciones">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Institución</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($instituciones as $i)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar institución"><a class="text-secondary" href="{{ route('instituciones.edit', $i->id) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar institución"><a class="text-danger" data-toggle="modal" data-target="#eliminar_institucion" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $i->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div> 