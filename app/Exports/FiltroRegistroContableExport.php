<?php

namespace App\Exports;

use App\User;
use App\Socio;
use App\Cuenta;
use App\Asociado;
use App\RegistroContable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FiltroRegistroContableExport implements FromCollection, WithHeadings
{

    public function __construct($fecha_solicitud_ini, $fecha_solicitud_fin, $monto_ini, $monto_fin, $tipo_registro_contable_id, $cuenta_id, $concepto_id, $socio_id, $asociado_id, $detalle)
    {

        ($fecha_solicitud_ini != 'null') ?  $fecha_solicitud_ini = $fecha_solicitud_ini : $fecha_solicitud_ini = null;
        ($fecha_solicitud_fin != 'null') ?  $fecha_solicitud_fin = $fecha_solicitud_fin : $fecha_solicitud_fin = null;
        ($monto_ini != 'null') ?  $monto_ini = $monto_ini : $monto_ini = null;
        ($monto_fin != 'null') ?  $monto_fin = $monto_fin : $monto_fin = null;
        ($tipo_registro_contable_id != 'null') ?  $tipo_registro_contable_id = $tipo_registro_contable_id : $tipo_registro_contable_id = null;
        ($cuenta_id != 'null') ?  $cuenta_id = $cuenta_id : $cuenta_id = null;
        ($concepto_id != 'null') ?  $concepto_id = $concepto_id : $concepto_id = null;
        ($socio_id != 'null') ?  $socio_id = $socio_id : $socio_id = null;
        ($asociado_id != 'null') ?  $asociado_id = $asociado_id : $asociado_id = null;
        ($detalle != 'null') ?  $detalle = $detalle : $detalle = null;

		$this->fecha_solicitud_ini = $fecha_solicitud_ini;
		$this->fecha_solicitud_fin = $fecha_solicitud_fin;
		$this->monto_ini = $monto_ini;
		$this->monto_fin = $monto_fin;
		$this->tipo_registro_contable_id = $tipo_registro_contable_id;
		$this->cuenta_id = $cuenta_id;
		$this->concepto_id = $concepto_id;
		$this->socio_id = $socio_id;
		$this->asociado_id = $asociado_id;
		$this->detalle = $detalle;

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$registros =  RegistroContable::select('fecha','usuario_id','tipo_registro_contable_id','numero_registro','concepto_id','socio_id','detalle','asociado_id','cheque','monto','cuenta_id')
    	->orderBY('fecha','DESC')
        ->fechaSolicitudFiltro($this->fecha_solicitud_ini, $this->fecha_solicitud_fin)
        ->montoFiltro($this->monto_ini, $this->monto_fin)
        ->tipoRegistroContableFiltro($this->tipo_registro_contable_id)
        ->cuentaFiltro($this->cuenta_id)
        ->conceptoFiltro($this->concepto_id, $this->tipo_registro_contable_id)
        ->socioFiltro($this->socio_id)
        ->asociadoFiltro($this->asociado_id)
        ->detalleFiltro($this->detalle)
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
