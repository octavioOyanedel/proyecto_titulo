<?php

use Illuminate\Database\Seeder;

class ParentescosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Parentesco::create(['nombre' => 'Hijo']);
        App\Parentesco::create(['nombre' => 'Hija']);
        App\Parentesco::create(['nombre' => 'Padre']);
        App\Parentesco::create(['nombre' => 'Madre']);
        App\Parentesco::create(['nombre' => 'Abuelo']);
        App\Parentesco::create(['nombre' => 'Abuela']);
    }
}
