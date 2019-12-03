<?php

namespace App\Exports;

use App\Socio;
use App\Prestamo;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FiltroPrestamoExport implements FromCollection, WithHeadings
{

    public function __construct($rut, $fecha_solicitud_ini, $fecha_solicitud_fin, $monto_ini, $monto_fin, $forma_pago_id, $fecha_pago_ini, $fecha_pago_fin, $numero_cuotas, $cuenta_id, $estado_deuda_id)
    {
        ($rut != 'null') ?  $rut = $rut : $rut = null;
        ($fecha_solicitud_ini != 'null') ?  $fecha_solicitud_ini = $fecha_solicitud_ini : $fecha_solicitud_ini = null;
        ($fecha_solicitud_fin != 'null') ?  $fecha_solicitud_fin = $fecha_solicitud_fin : $fecha_solicitud_fin = null;
        ($monto_ini != 'null') ?  $monto_ini = $monto_ini : $monto_ini = null;
        ($monto_fin != 'null') ?  $monto_fin = $monto_fin : $monto_fin = null;
        ($forma_pago_id != 'null') ?  $forma_pago_id = $forma_pago_id : $forma_pago_id = null;
        ($fecha_pago_ini != 'null') ?  $fecha_pago_ini = $fecha_pago_ini : $fecha_pago_ini = null;
        ($fecha_pago_fin != 'null') ?  $fecha_pago_fin = $fecha_pago_fin : $fecha_pago_fin = null;
        ($numero_cuotas != 'null') ?  $numero_cuotas = $numero_cuotas : $numero_cuotas = null;
        ($cuenta_id != 'null') ?  $cuenta_id = $cuenta_id : $cuenta_id = null;
        ($estado_deuda_id != 'null') ?  $estado_deuda_id = $estado_deuda_id : $estado_deuda_id = null;


        $this->rut = $rut;
        $this->fecha_solicitud_ini = $fecha_solicitud_ini;
        $this->fecha_solicitud_fin = $fecha_solicitud_fin;
        $this->monto_ini = $monto_ini;
        $this->monto_fin = $monto_fin;
        $this->forma_pago_id = $forma_pago_id;
        $this->fecha_pago_ini = $fecha_pago_ini;
        $this->fecha_pago_fin = $fecha_pago_fin;
        $this->numero_cuotas = $numero_cuotas;
        $this->cuenta_id = $cuenta_id;
        $this->estado_deuda_id = $estado_deuda_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $prestamos = Prestamo::select('fecha_solicitud','socio_id','numero_egreso','cuenta_id','cheque','forma_pago_id','fecha_pago_deposito','monto','numero_cuotas','estado_deuda_id','interes_id')
        ->orderBY('fecha_solicitud','DESC')
        ->fechaSolicitud($this->fecha_solicitud_ini, $this->fecha_solicitud_fin)
        ->fechaPago($this->fecha_pago_ini, $this->fecha_pago_fin)
        ->monto($this->monto_ini, $this->monto_fin)
        ->numeroCuotas($this->numero_cuotas)
        ->formaPagoFiltro($this->forma_pago_id)
        ->rutFiltro($this->rut)
        ->cuentaId($this->cuenta_id)
        ->estadoDeudaIdFiltro($this->estado_deuda_id)
        ->get();
        foreach ($prestamos as $p) {
        	$p->socio_id = Socio::findOrFail($p->socio_id)->nombre1.' '.Socio::findOrFail($p->socio_id)->apellido1.' - '.Socio::findOrFail($p->socio_id)->rut;
        }
        return $prestamos;        
    }

    public function headings(): array
    {
        return [
            'Fecha de solicitud','Socio','Número de egreso','Cuenta','Cheque','Forma de pago','Fecha de pago depósito','Monto','Número de cuotas','Estado deuda','Interes',
        ];
    }     
}
