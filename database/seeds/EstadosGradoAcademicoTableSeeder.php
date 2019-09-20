<?php

use Illuminate\Database\Seeder;

class EstadosGradoAcademicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\EstadoGradoAcademico::create(['nombre' => 'Egresado']);
        App\EstadoGradoAcademico::create(['nombre' => 'Cursando']);
        App\EstadoGradoAcademico::create(['nombre' => 'Incompleto']);
        App\EstadoGradoAcademico::create(['nombre' => 'Titulado']);
    }
}
