<?php

use Illuminate\Database\Seeder;

class GradosAcademicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\GradoAcademico::create(['nombre' => 'Educación Básica']);
        App\GradoAcademico::create(['nombre' => 'Educación Media Humanista']);
        App\GradoAcademico::create(['nombre' => 'Educación Media Técnico Profesional']);
        App\GradoAcademico::create(['nombre' => 'Centro de Formación Técnica / Instituto Profesional (CFT - IP)']);
        App\GradoAcademico::create(['nombre' => 'Educación Universitaria']);
        App\GradoAcademico::create(['nombre' => 'Postgrado']);
    }
}
