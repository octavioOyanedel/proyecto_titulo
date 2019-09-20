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
        App\Institucion::create(['nombre' => 'Colegio Salesiano Valparaíso']);
        App\Institucion::create(['nombre' => 'Escuela Industrial Superior de Valparaíso']);
        App\Institucion::create(['nombre' => 'INACAP']);
        App\Institucion::create(['nombre' => 'PUCV - Pontificia Universidad Católica de Valparaíso']);
    }
}
