<?php

namespace App\Exports;

use App\Socio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SocioExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')->orderBY('apellido1','ASC')->get();
    }

    public function headings(): array
    {
        return [
            'Apellido materno','Apellido paterno','Primer nombre','Segundo nombre','Rut','Género','Fecha nacimiento','Celular','Correo','Dirección','Fecha ingreso PUCV','anexo',
            'Número socio','Fecha ingreso Sind1','Comuna','Ciudad','Sede','Área','Cargo','Estado socio','Nacionalidad',
        ];
    }    
}
