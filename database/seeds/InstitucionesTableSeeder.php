<?php

use Illuminate\Database\Seeder;

class InstitucionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Institucion::create(['nombre' => 'Colegio Salesiano Valparaíso','grado_academico_id' => 1]);
        App\Institucion::create(['nombre' => 'Colegio Salesiano Valparaíso','grado_academico_id' => 2]);       
        App\Institucion::create(['nombre' => 'Colegio Salesiano Valparaíso','grado_academico_id' => 3]); 
        App\Institucion::create(['nombre' => 'Escuela Industrial Superior de Valparaíso','grado_academico_id' => 3]);
        App\Institucion::create(['nombre' => 'INACAP','grado_academico_id' => 4]);
        App\Institucion::create(['nombre' => 'PUCV - Pontificia Universidad Católica de Valparaíso','grado_academico_id' => 5]);
        App\Institucion::create(['nombre' => 'PUCV - Pontificia Universidad Católica de Valparaíso','grado_academico_id' => 6]);        
    }
}
