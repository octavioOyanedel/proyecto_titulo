<?php

use Illuminate\Database\Seeder;

class EstadosDeudaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\EstadoDeuda::create(['nombre' => 'Pagado']);
        App\EstadoDeuda::create(['nombre' => 'Vigente']);
        App\EstadoDeuda::create(['nombre' => 'Atrasada']);
    }
}
