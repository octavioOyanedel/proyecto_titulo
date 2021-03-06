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
            'numero_egreso' => 300,
            'cuenta_id' => 2,
            'cheque' => 123456789,
            'fecha_pago_deposito' => null,
            'monto' => 50000,
            'numero_cuotas' => 5,
            'socio_id' => 1,
            'estado_deuda_id' => 1,           
            'interes_id' => 1,
            'forma_pago_id' => 1
        ]);

        App\Prestamo::create([
            'fecha_solicitud' => '2015-11-20',
            'numero_egreso' => 450,
            'cuenta_id' => 2,
            'cheque' => 987654321,
            'fecha_pago_deposito' => null,
            'monto' => 60000,
            'numero_cuotas' => 6,
            'socio_id' => 1,
            'estado_deuda_id' => 1,           
            'interes_id' => 1,
            'forma_pago_id' => 1
        ]);
    }
}
