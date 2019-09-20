<?php

use Illuminate\Database\Seeder;

class NacionalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Nacionalidad::create(['nombre' => 'Haití']);
        App\Nacionalidad::create(['nombre' => 'Chile']);
        App\Nacionalidad::create(['nombre' => 'Venezuela']);
    }
}
