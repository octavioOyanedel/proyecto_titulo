<?php

use Illuminate\Database\Seeder;

class AsociadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Asociado::create(['concepto' => 'Asesor Jurídico', 'nombre' => 'Alfonso Muñoz']);
        App\Asociado::create(['concepto' => 'Asesor Relaciones Públicas', 'nombre' => 'Gabriel Toro']);
        App\Asociado::create(['concepto' => 'Librería PUCV', 'nombre' => 'Leni León']);
        App\Asociado::create(['concepto' => 'VTR', 'nombre' => 'Leni León']);
        App\Asociado::create(['concepto' => 'Secretaria Sindicato', 'nombre' => 'Ximena Barrueto Martínez']);
        App\Asociado::create(['concepto' => 'Dirigentes', 'nombre' => '']);
        App\Asociado::create(['concepto' => 'Contadora', 'nombre' => '']);
        App\Asociado::create(['concepto' => 'PUCV', 'nombre' => '']);
    }
}
