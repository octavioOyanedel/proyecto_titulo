<?php

use Illuminate\Database\Seeder;

class FormasPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\FormaPago::create(['nombre' => 'Descuento por planilla']);
        App\FormaPago::create(['nombre' => 'Depósito']);
    }
}
