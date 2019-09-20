<?php

use Illuminate\Database\Seeder;

class EstadosSocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\EstadoSocio::create(['nombre' => 'Activo']);
        App\EstadoSocio::create(['nombre' => 'Jubilado']);
        App\EstadoSocio::create(['nombre' => 'Renuncia Voluntaria']);
        App\EstadoSocio::create(['nombre' => 'Desvinculación PUCV']);
        App\EstadoSocio::create(['nombre' => 'Fallecido']);
    }
}
