<div class="tab-pane fade" id="nav-cargo" role="tabpanel" aria-labelledby="nav-cargo-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('cargos.create') }}">Agregar nuevo cargo</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-cargos">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col">Cargo</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($cargos as $c)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar cargo"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar cargo"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="text-center">{{ $c->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                        
</div>