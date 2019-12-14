<?php

namespace App\Exports;

use App\Socio;
use App\CargaFamiliar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CargaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $cargas = CargaFamiliar::select('apellido1','apellido2','nombre1','nombre2','rut','fecha_nac','socio_id','parentesco_id')
        ->orderBY('apellido1','ASC')
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
