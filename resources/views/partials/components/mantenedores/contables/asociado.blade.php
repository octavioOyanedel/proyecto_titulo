<div class="tab-pane fade" id="nav-asociado" role="tabpanel" aria-labelledby="nav-asociado-tab">
    <a class="btn btn-primary mt-4 mb-4" href="{{ route('asociados.create') }}">Agregar Asociado</a> 

    @if($asociados->count() === 0)
        <div class="alert alert-warning mt-4 text-center" role="alert">
            <b>No existen registros.</b>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover data-tables table-striped table-bordered" id="tabla-asociados">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="text-center" scope="col" title="">&nbsp;</th>
                        <th class="" scope="col">Asociado</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($asociados as $a)
                        <tr>                                                
                            <td width="50" class="text-center" scope="row" title="Editar asociado"><a class="text-secondary" href="{{ route('asociados.edit', $a) }}"><span>@svg('editar')</span></a></td>
                            <td width="50" class="text-center" scope="row" title="Eliminar asociado"><a class="text-danger" href="{{ route('asociados.show', $a->id) }}"><span>@svg('eliminar')</span></a></td>
                            <td class="">{{ $a->concepto }}@if($a->nombre != null), {{ $a->nombre }} @endif</td>
                        </tr>
                    @endforeach
                </tbody>                                 
            </table>
        </div>
    @endif                                
</div> 