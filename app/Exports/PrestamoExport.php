<?php

namespace App\Exports;

use App\Prestamo;
use App\Socio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrestamoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $prestamos = Prestamo::select('fecha_solicitud','socio_id','numero_egreso','cuenta_id','cheque','forma_pago_id','fecha_pago_deposito','monto','numero_cuotas','estado_deuda_id','interes_id')->orderBY('fecha_solicitud','DESC')->get();
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
