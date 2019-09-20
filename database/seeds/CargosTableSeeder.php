<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Cargo::create(['nombre' => 'Auxiliar de Aseo']);
        App\Cargo::create(['nombre' => 'Auxiliar de Mantención']);
        App\Cargo::create(['nombre' => 'Chofer']);
        App\Cargo::create(['nombre' => 'Jardinero']);
        App\Cargo::create(['nombre' => 'Recepcionista']);
        App\Cargo::create(['nombre' => 'Secretaria']);
        App\Cargo::create(['nombre' => 'Vigilante']);
        App\Cargo::create(['nombre' => 'Soporte Informático']);
    }
}
