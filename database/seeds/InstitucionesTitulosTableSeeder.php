<?php

use Illuminate\Database\Seeder;

class InstitucionesTitulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\InstitucionTitulo::create(['institucion_id' => 1, 'titulo_id' => 1]);
        App\InstitucionTitulo::create(['institucion_id' => 1, 'titulo_id' => 2]);
        App\InstitucionTitulo::create(['institucion_id' => 1, 'titulo_id' => 3]);
        App\InstitucionTitulo::create(['institucion_id' => 2, 'titulo_id' => 3]);
        App\InstitucionTitulo::create(['institucion_id' => 3, 'titulo_id' => 4]);
        App\InstitucionTitulo::create(['institucion_id' => 4, 'titulo_id' => 5]);
    }
}
