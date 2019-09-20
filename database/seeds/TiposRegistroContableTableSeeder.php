<?php

use Illuminate\Database\Seeder;

class TiposRegistroContableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\TipoRegistroContable::create(['nombre' => 'Egreso']);
        App\TipoRegistroContable::create(['nombre' => 'Ingreso']);
    }
}
