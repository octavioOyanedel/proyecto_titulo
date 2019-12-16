<?php

namespace App\Exports;

use App\Socio;
use App\CargaFamiliar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BusquedaCargaExport implements FromCollection, WithHeadings
{

    public function __construct($buscar_carga)
    {
    	($buscar_carga != 'null') ?  $buscar_carga = $buscar_carga : $buscar_carga = null;
    	$this->buscar_carga = $buscar_carga;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $campo = $this->buscar_carga;
        $cargas = CargaFamiliar::select('apellido1','apellido2','nombre1','nombre2','rut','fecha_nac','socio_id','parentesco_id')
        ->orderBY('apellido1','ASC')
        ->nombre1($campo)
        ->nombre2($campo)
        ->apellido1($campo)
        ->apellido2($campo)
        ->parentesco($campo)
        ->socio($campo)
        ->rut($campo)
        ->fechaNacimiento($campo)
        ->get();
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
