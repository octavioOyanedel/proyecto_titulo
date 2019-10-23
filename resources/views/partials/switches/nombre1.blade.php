@switch($ruta)
    @case(buscarTexto($ruta,'socios') === 0)
        @php $nombre1 = $socio->nombre1 @endphp
        @break

    @case(buscarTexto($ruta,'usuarios') === 0)
        @php $nombre1 = $usuario->nombre1 @endphp
        @break

    @default
        @php $nombre1 = '' @endphp
@endswitch