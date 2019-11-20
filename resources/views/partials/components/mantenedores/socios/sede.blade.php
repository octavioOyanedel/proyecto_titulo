<div class="tab-pane fade show active" id="nav-sede" role="tabpanel" aria-labelledby="nav-sede-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('sedes.create') }}">Agregar Sede</a> 

    @if($sedes->count() === 0)
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
                        <th class="" scope="col">Sede</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($sedes as $s)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar sede"><a class="text-secondary" href="{{ route('sedes.edit',$s) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar sede"><a class="text-danger" href="{{ route('sedes.show',$s) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $s->nombre }}</td>
                        </tr>                   
                    @endforeach 
                </tbody>                                 
            </table>
        </div>
        <div class="float-right mt-3">
            {{ $sedes->links() }}    
        </div>              
    @endif
</div>