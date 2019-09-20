<?php

use Illuminate\Database\Seeder;

class TitulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Titulo::create(['nombre' => 'Enseñanza Básica']);
        App\Titulo::create(['nombre' => 'Licenciatura de Enseñanza Media Científico Humanista']);
        App\Titulo::create(['nombre' => 'Técnico de Nivel Medio en Mecánica Automotriz']);
        App\Titulo::create(['nombre' => 'Técnico de Nivel Superior en Programación']);
        App\Titulo::create(['nombre' => 'Ingeniería en Ejecución Informática']);
        App\Titulo::create(['nombre' => 'Sin Título']);
    }
}
