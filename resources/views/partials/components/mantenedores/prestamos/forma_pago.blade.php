<div class="tab-pane fade show active" id="nav-forma-pago" role="tabpanel" aria-labelledby="nav-forma-pago-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('formas_pago.create') }}">Agregar nueva forma de pago</a> 

    <div class="table-responsive">
        <table class="table table-hover" id="tabla-formas-pago">
            <thead>
                <tr>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th width="50" class="text-center" scope="col" title=""></th>
                    <th class="text-center" scope="col">Forma de pago</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($formas_pago as $f)
                    <tr>                                                
                        <td class="text-center" scope="row" title="Editar forma de pago"><a class="text-secondary" href="{{ route('formas_pago.edit',$f) }}"><span>@svg('editar')</span></a></td>
                        <td class="text-center" scope="row" title="Eliminar forma de pago"><a class="text-danger" data-toggle="modal" data-target="#eliminar_forma_pago" href="#"><span>@svg('eliminar')</span></a></td>
                        <td class="text-center">{{ $f->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>                                 
        </table>
    </div>                                
</div>  