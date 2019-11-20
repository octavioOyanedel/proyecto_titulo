<div class="tab-pane fade" id="nav-estado" role="tabpanel" aria-labelledby="nav-estado-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('estado_socios.create') }}">Agregar Estado</a> 

    @if($estados->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else   
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="" scope="col">Estado</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($estados as $e)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar estado socio"><a class="text-secondary" href="{{ route('estado_socios.edit',$e->id) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar estado socio"><a class="text-danger" href="{{ route('estado_socios.show',$e->id) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $e->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>                                 
            </table>
        </div>   
        <div class="float-right mt-3">
            {{ $estados->links() }}    
        </div>              
    @endif                    
</div>