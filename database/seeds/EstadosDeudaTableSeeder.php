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
        App\EstadoDeuda::create(['nombre' => 'Pagada']);
        App\EstadoDeuda::create(['nombre' => 'Pendiente']);
        App\EstadoDeuda::create(['nombre' => 'Atrasada']);
    }
}
