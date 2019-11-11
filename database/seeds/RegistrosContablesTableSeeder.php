<?php

use Illuminate\Database\Seeder;

class RegistrosContablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RegistroContable::create([
            'fecha' => '2010-01-01',
            'numero_registro' => 300,
            'cheque' => 123456789,
            'monto' => 50000,
            'usuario_id' => 1,
            'concepto_id' => 25,
            'detalle' => 'lalala',
            'tipo_registro_contable_id' => 1,
            'cuenta_id' => 2,
            'asociado_id' => null,
            'socio_id' => 1
        ]);
        App\RegistroContable::create([
            'fecha' => '2015-11-20',
            'numero_registro' => 450,
            'cheque' => 987654321,
            'monto' => 60000,
            'usuario_id' => 1,
            'concepto_id' => 32,
            'detalle' => 'lalala',
            'tipo_registro_contable_id' => 1,
            'cuenta_id' => 2,
            'asociado_id' => null,
            'socio_id' => 1
        ]);
        App\RegistroContable::create([
            'fecha' => '2015-11-07',
            'numero_registro' => 455,
            'cheque' => 887889990,
            'monto' => 400000,
            'usuario_id' => 1,
            'concepto_id' => 36,
            'detalle' => 'lalala',
            'tipo_registro_contable_id' => 1,
            'cuenta_id' => 1,
            'asociado_id' => null,
            'socio_id' => 10
        ]);
        App\RegistroContable::create([
            'fecha' => '2015-11-11',
            'numero_registro' => 466,
            'cheque' => null,
            'monto' => 400000,
            'usuario_id' => 1,
            'concepto_id' => 5,
            'detalle' => 'lalala',
            'tipo_registro_contable_id' => 2,
            'cuenta_id' => 1,
            'asociado_id' => null,
            'socio_id' => 10
        ]);
    }
}
