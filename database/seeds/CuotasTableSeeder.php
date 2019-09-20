<?php

use Illuminate\Database\Seeder;

class CuotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $array_prestamos = array(1,2,3);
        $array_cuotas = array(5,6,3);
        $array_montos = array(50000,60000,30000);
        $array_fechas_solicitud = array('2010-01-01','2015-11-20','2019-09-20');

        $id = 1;

        for ($i=1; $i <= count($array_prestamos) ; $i++) {
            $cuotas = $array_cuotas[$i-1];
            $fecha = $array_fechas_solicitud[$i-1];
            $dia_pago = 25;
            $year_inicio = 0;
            $mes_inicio = 0;
            $fecha_cuota = '';
            $montoConInteres = ((2 / 100) * $array_montos[$i-1]) + $array_montos[$i-1];
            $montoCouta = $montoConInteres / $array_cuotas[$i-1];
            //obtener año, mes y dia
            $year = substr($fecha, 0, -6);
            $mes = substr($fecha, 5, -3);
            $dia = substr($fecha, 8);
            $year_pago = $year + 0; //casteo a entreo
            //mes de inicio
            if ($dia < 15) {
                $mes_inicio = $mes + 0; //casteo a entero
            } else {
                //inicio mes siguiente
                $mes_inicio = $mes + 1;
                if ($mes_inicio == 13) {
                    $mes_inicio = 1;
                    $year_pago++;
                }
            }
            $year_inicio = $year;
            $mes_pago = $mes_inicio;
            for ($k=1; $k <= $array_cuotas[$i-1] ; $k++) {
                if ($mes_pago > 12) {
                    $mes_pago = 1;
                    $year_pago++;
                }
                if ($mes_pago < 10) {
                    $mes_pago = '0'.$mes_pago;
                }
                $fecha_cuota = (string)$year_pago.'-'.$mes_pago.'-'.$dia_pago;
                App\Cuota::create([
                        'fecha_pago' => $fecha_cuota,
                        'numero_cuota' => $k,
                        'monto' => $montoCouta,
                        'prestamo_id' => $id,
                        'estado_deuda_id' => ($id == 3) ? 2 : 1 
                    ]);
                $mes_pago++;
            }     
            $id++;
        }
    }
}
