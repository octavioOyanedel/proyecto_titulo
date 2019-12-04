<?php

namespace App\Exports;

use App\Socio;
use App\RegistroContable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ConciliacionExport implements FromCollection, WithHeadings
{

	public function __construct($cuenta, $mes, $year){
		$this->cuenta = $cuenta;
		$this->mes = $mes;
		$this->year = $year;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $mes = $this->mes;
        $year = $this->year;
        $fecha_inicio = obtenerFechaConciliacion($this->year.'-'.$this->mes.'-01');
        $fecha_final = obtenerFechaConciliacion($this->year.'-'.$this->mes.'-'.obtenerDiasPorMes($this->mes));

        $registros =  RegistroContable::select('fecha','numero_registro','concepto_id','socio_id','asociado_id','detalle','cheque','tipo_registro_contable_id')
        ->whereBetween('fecha', [date($fecha_inicio), date($fecha_final)])->where('cuenta_id', '=', $this->cuenta)
        ->orderBY('fecha','DESC')
        ->get();

        foreach ($registros as $r) {
        	if($r->socio_id){
        		$r->socio_id = Socio::findOrFail($r->socio_id)->nombre1.' '.Socio::findOrFail($r->socio_id)->apellido1;
        	}
        }

        return $registros;
    }

    public function headings(): array
    {
        return [
            'Fecha solicitud','Número de registro','Concepto','Socio','Asociado','Detalle','Cheque','Tipo de registro',
        ];
    }      
}
