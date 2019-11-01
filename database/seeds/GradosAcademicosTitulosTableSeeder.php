<?php

use Illuminate\Database\Seeder;

class GradosAcademicosTitulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\GradoAcademicoTitulo::create(['grado_academico_id' => 1, 'titulo_id' => 1]);
        App\GradoAcademicoTitulo::create(['grado_academico_id' => 2, 'titulo_id' => 2]);
        App\GradoAcademicoTitulo::create(['grado_academico_id' => 3, 'titulo_id' => 3]);
        App\GradoAcademicoTitulo::create(['grado_academico_id' => 4, 'titulo_id' => 4]);
        App\GradoAcademicoTitulo::create(['grado_academico_id' => 5, 'titulo_id' => 5]);
    }
}
