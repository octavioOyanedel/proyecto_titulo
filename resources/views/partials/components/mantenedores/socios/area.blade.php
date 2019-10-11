<div class="tab-pane fade" id="nav-area" role="tabpanel" aria-labelledby="nav-area-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('areas.create') }}">Agregar nueva área</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-areas">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th scope="col">Sede</th>
                    <th scope="col">Área</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($areas as $a)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar área"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar área"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                        <td>{{ $a->sede_id }}</td>
                        <td>{{ $a->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                        
</div>