<?php

namespace App\Exports;

use App\Socio;
use App\CargaFamiliar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class EstadisticaCargaExport implements FromCollection, WithHeadings
{

    public function __construct($nombre)
    {
        ($nombre != 'null') ?  $nombre = $nombre : $nombre = null;

        $this->nombre = $nombre;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	if($this->nombre === 'hijos'){
	         $cargas = CargaFamiliar::select('apellido1','apellido2','nombre1','nombre2','rut','fecha_nac','socio_id','parentesco_id')
	        ->orderBY('apellido1','ASC')
			->orWhere('parentesco_id','=',1)
			->orWhere('parentesco_id','=',2)
	        ->get();
    	}
    	if($this->nombre === 'padres'){
	         $cargas = CargaFamiliar::select('apellido1','apellido2','nombre1','nombre2','rut','fecha_nac','socio_id','parentesco_id')
	        ->orderBY('apellido1','ASC')
			->orWhere('parentesco_id','=',3)
			->orWhere('parentesco_id','=',4)
	        ->get();
    	}
    	if($this->nombre === 'abuelos'){
	         $cargas = CargaFamiliar::select('apellido1','apellido2','nombre1','nombre2','rut','fecha_nac','socio_id','parentesco_id')
	        ->orderBY('apellido1','ASC')
			->orWhere('parentesco_id','=',5)
			->orWhere('parentesco_id','=',6)
	        ->get();
    	}
        foreach ($cargas as $c) {
        	$c->socio_id = Socio::findOrFail($c->socio_id)->nombre1.' '.Socio::findOrFail($c->socio_id)->apellido1.' - '.Socio::findOrFail($c->socio_id)->rut;
        }
        return $cargas;
    }

    public function headings(): array
    {
        return [
            'Apellido materno','Apellido paterno','Primer nombre','Segundo nombre','Rut', 'Fecha de nacimiento', 'Socio', 'Parentesco'
        ];
    }
}
