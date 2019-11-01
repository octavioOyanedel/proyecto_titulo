<div class="tab-pane fade" id="nav-titulo" role="tabpanel" aria-labelledby="nav-titulo-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('titulos.create') }}">Nuevo Título</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-titulos">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Título</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($titulos as $t)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar título"><a class="text-secondary" href="{{ route('titulos.edit', $t->id) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar título"><a class="text-danger" data-toggle="modal" data-target="#eliminar_titulo" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $t->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div> 