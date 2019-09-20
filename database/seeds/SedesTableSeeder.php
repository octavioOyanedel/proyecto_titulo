<?php

use Illuminate\Database\Seeder;

class SedesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Sede::create(['nombre' => 'Casa Central']);
        App\Sede::create(['nombre' => 'FIN']);
        App\Sede::create(['nombre' => 'IBC']);
        App\Sede::create(['nombre' => 'Gimpert']);
        App\Sede::create(['nombre' => 'Sausalito']);
        App\Sede::create(['nombre' => 'Curauma']);
        App\Sede::create(['nombre' => 'Historia']);
        App\Sede::create(['nombre' => 'IMA']);
    }
}
