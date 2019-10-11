<div class="tab-pane fade" id="nav-asociado" role="tabpanel" aria-labelledby="nav-asociado-tab">
    <a class="btn btn-primary mt-4 mb-4" href="">Nuevo asociado</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-asociados">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col">Asociado</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($asociados as $a)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar asociado"><a class="text-secondary" href=""><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar asociado"><a class="text-danger" data-toggle="modal" data-target="#exampleModal" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="text-center">{{ $a->concepto }}, {{ $a->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div> 