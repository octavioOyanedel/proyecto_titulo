<?php

use Illuminate\Database\Seeder;

class EstudiosRealizadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\EstudioRealizado::create([
            'titulo_id' => 5,
            'institucion_id' => 4,
            'grado_academico_id' => 5,
            'estado_grado_academico_id' => 4
        ]);
        App\EstudioRealizado::create([
            'titulo_id' => 3,
            'institucion_id' => 2,
            'grado_academico_id' => 3,
            'estado_grado_academico_id' => 4
        ]); 
        App\EstudioRealizado::create([
            'titulo_id' => 6,
            'institucion_id' => 4,
            'grado_academico_id' => 5,
            'estado_grado_academico_id' => 3
        ]);                  
    }
}
