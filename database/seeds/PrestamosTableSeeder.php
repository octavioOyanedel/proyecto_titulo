<?php

use Illuminate\Database\Seeder;

class PrestamosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Prestamo::create([
            'fecha_solicitud' => '2010-01-01',
            'numero_egreso' => rand(1, 999999),
            'cheque' => rand(10000000, 99999999),
            'monto' => 50000,
            'numero_cuotas' => 5,
            'rut' => '111111111',
            'estado_deuda_id' => 1,           
            'interes_id' => 1,
            'forma_pago_id' => 1
        ]);
        App\Prestamo::create([
            'fecha_solicitud' => '2015-11-20',
            'numero_egreso' => rand(1, 999999),
            'cheque' => rand(10000000, 99999999),
            'monto' => 60000,
            'numero_cuotas' => 6,
            'rut' => '111111111',
            'estado_deuda_id' => 1,           
            'interes_id' => 1,
            'forma_pago_id' => 1
        ]);
        App\Prestamo::create([
            'fecha_solicitud' => '2019-09-20',
            'numero_egreso' => rand(1, 999999),
            'cheque' => rand(10000000, 99999999),
            'monto' => 30000,
            'numero_cuotas' => 3,
            'rut' => '111111111',
            'estado_deuda_id' => 2,           
            'interes_id' => 1,
            'forma_pago_id' => 1
        ]);
    }
}
