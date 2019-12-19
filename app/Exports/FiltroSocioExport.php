<?php

namespace App\Exports;

use App\Socio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FiltroSocioExport implements FromCollection, WithHeadings
{

    public function __construct($desvinculados, $fecha_nac_ini, $fecha_nac_fin, $fecha_pucv_ini, $fecha_pucv_fin, $fecha_sind1_ini, $fecha_sind1_fin, $genero, $rut, $comuna_id, $ciudad_id, $direccion, $sede_id, $area_id, $cargo_id, $estado_socio_id, $nacionalidad_id)
    {
        ($fecha_nac_ini != 'null') ?  $fecha_nac_ini = $fecha_nac_ini : $fecha_nac_ini = null;
        ($fecha_nac_fin != 'null') ?  $fecha_nac_fin = $fecha_nac_fin : $fecha_nac_fin = null;
        ($fecha_pucv_ini != 'null') ?  $fecha_pucv_ini = $fecha_pucv_ini : $fecha_pucv_ini = null;
        ($fecha_pucv_fin != 'null') ?  $fecha_pucv_fin = $fecha_pucv_fin : $fecha_pucv_fin = null;
        ($fecha_sind1_ini != 'null') ?  $fecha_sind1_ini = $fecha_sind1_ini : $fecha_sind1_ini = null;
        ($fecha_sind1_fin != 'null') ?  $fecha_sind1_fin = $fecha_sind1_fin : $fecha_sind1_fin = null;
        ($genero != 'null') ?  $genero = $genero : $genero = null;
        ($rut != 'null') ?  $rut = $rut : $rut = null;
        ($comuna_id != 'null') ?  $comuna_id = $comuna_id : $comuna_id = null;
        ($ciudad_id != 'null') ?  $ciudad_id = $ciudad_id : $ciudad_id = null;
        ($direccion != 'null') ?  $direccion = $direccion : $direccion = null;
        ($sede_id != 'null') ?  $sede_id = $sede_id : $sede_id = null;
        ($area_id != 'null') ?  $area_id = $area_id : $area_id = null;
        ($cargo_id != 'null') ?  $cargo_id = $cargo_id : $cargo_id = null;
        ($estado_socio_id != 'null') ?  $estado_socio_id = $estado_socio_id : $estado_socio_id = null;
        ($nacionalidad_id != 'null') ?  $nacionalidad_id = $nacionalidad_id : $nacionalidad_id = null;
        ($desvinculados != 'null') ?  $desvinculados = $desvinculados : $desvinculados = null;


        $this->desvinculados = $desvinculados;
        $this->fecha_nac_ini = $fecha_nac_ini;
        $this->fecha_nac_fin = $fecha_nac_fin;
        $this->fecha_pucv_ini = $fecha_pucv_ini;
        $this->fecha_pucv_fin = $fecha_pucv_fin;
        $this->fecha_sind1_ini = $fecha_sind1_ini;
        $this->fecha_sind1_fin = $fecha_sind1_fin;
        $this->genero = $genero;
        $this->rut = $rut;
        $this->comuna_id = $comuna_id;
        $this->ciudad_id = $ciudad_id;
        $this->direccion = $direccion;
        $this->sede_id = $sede_id;
        $this->area_id = $area_id;
        $this->cargo_id = $cargo_id;
        $this->estado_socio_id = $estado_socio_id;
        $this->nacionalidad_id = $nacionalidad_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        switch($this->desvinculados){
            case 'activos':
                return Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')
                ->orderBY('apellido1','ASC')
                ->fechaNacimiento($this->fecha_nac_ini,$this->fecha_nac_fin)
                ->fechaIngresoPucv($this->fecha_pucv_ini,$this->fecha_pucv_fin)
                ->fechaIngresoSind1($this->fecha_sind1_ini,$this->fecha_sind1_fin)
                ->genero($this->genero)
                ->rutFiltro($this->rut)
                ->comunaId($this->comuna_id)
                ->ciudadId($this->ciudad_id)
                ->direccion($this->direccion)
                ->sedeId($this->sede_id)
                ->areaId($this->area_id)
                ->cargoId($this->cargo_id)
                ->estadoSocioId($this->estado_socio_id)
                ->nacionalidadId($this->nacionalidad_id)
                ->get();
            break;
            case 'incluir':
                return Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')->withTrashed()
                ->orderBY('apellido1','ASC')
                ->fechaNacimiento($this->fecha_nac_ini,$this->fecha_nac_fin)
                ->fechaIngresoPucv($this->fecha_pucv_ini,$this->fecha_pucv_fin)
                ->fechaIngresoSind1($this->fecha_sind1_ini,$this->fecha_sind1_fin)
                ->genero($this->genero)
                ->rutFiltro($this->rut)
                ->comunaId($this->comuna_id)
                ->ciudadId($this->ciudad_id)
                ->direccion($this->direccion)
                ->sedeId($this->sede_id)
                ->areaId($this->area_id)
                ->cargoId($this->cargo_id)
                ->estadoSocioId($this->estado_socio_id)
                ->nacionalidadId($this->nacionalidad_id)
                ->get();
            break;
            case 'solo':
                return Socio::select('apellido1','apellido2','nombre1','nombre2','rut','genero','fecha_nac','celular','correo','direccion','fecha_pucv','anexo','numero_socio','fecha_sind1','comuna_id','ciudad_id','sede_id','area_id','cargo_id','estado_socio_id','nacionalidad_id')->onlyTrashed()
                ->orderBY('apellido1','ASC')
                ->fechaNacimiento($this->fecha_nac_ini,$this->fecha_nac_fin)
                ->fechaIngresoPucv($this->fecha_pucv_ini,$this->fecha_pucv_fin)
                ->fechaIngresoSind1($this->fecha_sind1_ini,$this->fecha_sind1_fin)
                ->genero($this->genero)
                ->rutFiltro($this->rut)
                ->comunaId($this->comuna_id)
                ->ciudadId($this->ciudad_id)
                ->direccion($this->direccion)
                ->sedeId($this->sede_id)
                ->areaId($this->area_id)
                ->cargoId($this->cargo_id)
                ->estadoSocioId($this->estado_socio_id)
                ->nacionalidadId($this->nacionalidad_id)
                ->get();
            break;
        }
    }

    public function headings(): array
    {
        return [
            'Apellido paterno','Apellido materno','Primer nombre','Segundo nombre','Rut','Género','Fecha nacimiento','Celular','Correo','Dirección','Fecha ingreso PUCV','Anexo',
            'Número socio','Fecha ingreso Sind1','Comuna','Ciudad','Sede','Área','Cargo','Estado socio','Nacionalidad',
        ];
    }
}
