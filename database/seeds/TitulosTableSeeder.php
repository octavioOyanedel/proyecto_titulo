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
        App\Titulo::create(['nombre' => 'Graduado de Enseñanza Básica','grado_academico_id' => 1]);
        App\Titulo::create(['nombre' => 'Licenciatura de Enseñanza Media Científico Humanista','grado_academico_id' => 2]);
        App\Titulo::create(['nombre' => 'Técnico de Nivel Medio en Mecánica Automotriz','grado_academico_id' => 3]);
        App\Titulo::create(['nombre' => 'Técnico de Nivel Superior en Programación','grado_academico_id' => 4]);
        App\Titulo::create(['nombre' => 'Ingeniería en Ejecución Informática','grado_academico_id' => 5]);
        App\Titulo::create(['nombre' => 'Magíster en Ejecución Informática','grado_academico_id' => 6]);
    }
}
