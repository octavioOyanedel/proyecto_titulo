<?php

namespace App\Exports;

use App\Socio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BusquedaSocioExport implements FromCollection, WithHeadings
{

    public function __construct($buscar_socio)
    {

    	($buscar_socio != 'null') ?  $buscar_socio = $buscar_socio : $buscar_socio = null;
    	$this->buscar_socio = $buscar_socio;

    }	
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$campo = $this->buscar_socio;
        return $socios = Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')
        ->rut($campo)
        ->generoUnico($campo)
        ->fechaUnica($campo)
        ->nombre1($campo)
        ->nombre2($campo)
        ->apellido1($campo)
        ->apellido2($campo)
        ->celular($campo)
        ->anexo($campo)
        ->correo($campo)
        ->numeroSocio($campo)
        ->sede($campo)
        ->area($campo)
        ->cargo($campo) 
        ->orderBy('apellido1','ASC')->get();
    }

    public function headings(): array
    {
        return [
            'Apellido materno','Apellido paterno','Primer nombre','Segundo nombre','Rut','Género','Fecha nacimiento','Celular','Correo','Dirección','Fecha ingreso PUCV','anexo',
            'Número socio','Fecha ingreso Sind1','Comuna','Ciudad','Sede','Área','Cargo','Estado socio','Nacionalidad',
        ];
    }     
}
