<?php

namespace App\Exports;

use App\Socio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstadisticaIncorporadoSocioExport implements FromCollection, WithHeadings
{

    public function __construct($mes, $estado)
    {
        ($mes != 'null') ?  $mes = $mes : $mes = null;
        ($estado != 'null') ?  $estado = $estado : $estado = null;

        $this->mes = $mes;
        $this->estado = $estado;

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $fecha_ini = date('Y').'-'.$this->mes.'-01';
        $fecha_fin = date('Y').'-'.$this->mes.'-'.obtenerDiasPorMes($this->mes);    

        if($this->estado === 'incorporados'){
            return $socios = Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')->whereBetween('fecha_sind1', [date($fecha_ini),date($fecha_fin)])
            ->orderBy('apellido1','ASC')->get(); 
        }else{
            return $socios = Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')->onlyTrashed()->whereBetween('deleted_at', [date($fecha_ini),date($fecha_fin)])
            ->orderBy('apellido1','ASC')->get();                     
        }       
         
    }

    public function headings(): array
    {
        return [
            'Apellido materno','Apellido paterno','Primer nombre','Segundo nombre','Rut','Género','Fecha nacimiento','Celular','Correo','Dirección','Fecha ingreso PUCV','anexo',
            'Número socio','Fecha ingreso Sind1','Comuna','Ciudad','Sede','Área','Cargo','Estado socio','Nacionalidad',
        ];
    }    
}
