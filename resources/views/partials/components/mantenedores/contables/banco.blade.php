<div class="tab-pane fade" id="nav-banco" role="tabpanel" aria-labelledby="nav-banco-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('bancos.create') }}">Agregar Banco</a> 

    <div class="table-responsive">
        <table class="table table-hover data-tables" id="tabla-bancos">
            <thead>
                <tr>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col" title=""></th>
                    <th class="" scope="col">Banco</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($bancos as $b)
                    <tr>                                                
                        <td width="50" class="text-center" scope="row" title="Editar banco"><a class="text-secondary" href="{{ route('bancos.edit', $b) }}"><span>@svg('editar')</span></a></td>
                        <td width="50" class="text-center" scope="row" title="Eliminar banco"><a id="modal_eliminar_banco" class="text-danger" data-toggle="modal" data-target="#eliminar_banco" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="">{{ $b->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>