<?php

use Illuminate\Database\Seeder;

class EstudiosRealizadosSociosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\EstudioRealizadoSocio::create([
            'socio_id' => 1,
            'estudio_realizado_id' => 1
        ]);
        App\EstudioRealizadoSocio::create([
            'socio_id' => 2,
            'estudio_realizado_id' => 2

        ]); 
        App\EstudioRealizadoSocio::create([
            'socio_id' => 2,
            'estudio_realizado_id' => 3
        ]); 
    }
}
