<?php

namespace App\Exports;

use App\Socio;
use App\GradoAcademico;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class EstadisticaEstudioSocioExport implements FromCollection, WithHeadings
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
    	$grado = (new GradoAcademico)->obtenerIdPorNombre($this->nombre);
    	return $socios = Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')
		->join('estudios_realizados_socios','estudios_realizados_socios.socio_id','=','socios.id')
		->join('estudios_realizados','estudios_realizados_socios.estudio_realizado_id','=','estudios_realizados.id')
		->join('grados_academicos','estudios_realizados.grado_academico_id','=','grados_academicos.id')
		->where('estudios_realizados.grado_academico_id','=',$grado->id)
		->orderBy('apellido1','ASC')->get();
    }

    public function headings(): array
    {
        return [
            'Apellido paterno','Apellido materno','Primer nombre','Segundo nombre','Rut','Género','Fecha nacimiento','Celular','Correo','Dirección','Fecha ingreso PUCV','Anexo',
            'Número socio','Fecha ingreso Sind1','Comuna','Ciudad','Sede','Área','Cargo','Estado socio','Nacionalidad',
        ];
    }
}
