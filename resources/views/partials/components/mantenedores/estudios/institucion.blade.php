<div class="tab-pane fade" id="nav-institucion" role="tabpanel" aria-labelledby="nav-institucion-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('instituciones.create') }}">Agregar Institución</a> 

    @if($instituciones->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-instituciones">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="" scope="col">Institución</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($instituciones as $i)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar institución"><a class="text-secondary" href="{{ route('instituciones.edit', $i->id) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar institución"><a class="text-danger" href="{{ route('instituciones.show', $i->id) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $i->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>                                 
            </table>
        </div>      
    @endif                                  
</div> 