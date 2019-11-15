<div class="tab-pane fade" id="nav-cargo" role="tabpanel" aria-labelledby="nav-cargo-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('cargos.create') }}">Agregar Cargo</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-cargos">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Cargo</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($cargos as $c)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar cargo"><a class="text-secondary" href="{{ route('cargos.edit',$c) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar cargo"><a class="text-danger" href="{{ route('cargos.show',$c) }}"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $c->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                        
</div>