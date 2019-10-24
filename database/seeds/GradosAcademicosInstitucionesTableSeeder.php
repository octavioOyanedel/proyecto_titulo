<?php

use Illuminate\Database\Seeder;

class GradosAcademicosInstitucionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()	
    {
    	App\GradoAcademicoInstitucion::create(['grado_academico_id' => 1, 'institucion_id' => 1]);
    	App\GradoAcademicoInstitucion::create(['grado_academico_id' => 2, 'institucion_id' => 1]);
    	App\GradoAcademicoInstitucion::create(['grado_academico_id' => 3, 'institucion_id' => 1]);
    	App\GradoAcademicoInstitucion::create(['grado_academico_id' => 3, 'institucion_id' => 2]);
    	App\GradoAcademicoInstitucion::create(['grado_academico_id' => 4, 'institucion_id' => 3]);
    	App\GradoAcademicoInstitucion::create(['grado_academico_id' => 5, 'institucion_id' => 4]);
    	App\GradoAcademicoInstitucion::create(['grado_academico_id' => 6, 'institucion_id' => 4]);
    }
}
