<?php

use Illuminate\Database\Seeder;

class ConceptosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Concepto::create(['nombre' => 'Cuota Mortuoria', 'detalle' => '']);
        App\Concepto::create(['nombre' => 'Anticipo Cuota Mortuoria', 'detalle' => '']);
        App\Concepto::create(['nombre' => 'Préstamo', 'detalle' => '']);
        App\Concepto::create(['nombre' => 'Nulo', 'detalle' => '']);
    }
}
