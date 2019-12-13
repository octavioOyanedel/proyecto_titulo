<?php

namespace App\Exports;

use App\User;
use App\Socio;
use App\Cuenta;
use App\Asociado;
use App\RegistroContable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BusquedaRegistroContableExport implements FromCollection, WithHeadings
{

    public function __construct($buscar_registro)
    {
    	($buscar_registro != 'null') ?  $buscar_registro = $buscar_registro : $buscar_registro = null;
    	$this->buscar_registro = $buscar_registro;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$campo = $this->buscar_registro;
    	$registros =  RegistroContable::select('fecha','usuario_id','tipo_registro_contable_id','numero_registro','concepto_id','socio_id','detalle','asociado_id','cheque','monto','cuenta_id')
    	->orderBY('fecha','DESC')
        ->fechaUnica($campo)
        ->tipoRegistroContableId($campo)
        ->numeroRegistro($campo)
        ->cheque($campo)
        ->montoUnico($campo)
        ->get();
        foreach ($registros as $r) {
        	$r->usuario_id = User::findOrFail($r->usuario_id)->nombre1.' '.User::findOrFail($r->usuario_id)->apellido1.' - '.User::findOrFail($r->usuario_id)->email;
        	if($r->socio_id){
        		$r->socio_id = Socio::findOrFail($r->socio_id)->nombre1.' '.Socio::findOrFail($r->socio_id)->apellido1.' - '.Socio::findOrFail($r->socio_id)->rut;
        	}
        	if($r->asociado_id){
        		$r->asociado_id = Asociado::findOrFail($r->asociado_id)->concepto.' '.Asociado::findOrFail($r->asociado_id)->nombre;
        	}
        	if($r->cuenta_id){
        		$r->cuenta_id = Cuenta::findOrFail($r->cuenta_id)->tipo_cuenta_id.' N° '.Cuenta::findOrFail($r->cuenta_id)->numero.' - '.Cuenta::findOrFail($r->cuenta_id)->banco_id;
        	}
        }

        return $registros;
    }

    public function headings(): array
    {
        return [
            'Fecha de solicitud','Registrado por','Tipo de registro','Número de registro','Concepto','Socio','Detalle','Asociado','Cheque','Monto','Cuenta',
        ];
    }
}
