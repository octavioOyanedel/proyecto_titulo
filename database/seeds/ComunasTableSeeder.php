<?php

use Illuminate\Database\Seeder;

class ComunasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Comuna::create(['nombre' => 'Los Andes']);
        App\Comuna::create(['nombre' => 'La Ligua']);
        App\Comuna::create(['nombre' => 'Quillota']);
        App\Comuna::create(['nombre' => 'San Antonio']);
        App\Comuna::create(['nombre' => 'San Felipe']);
        App\Comuna::create(['nombre' => 'Valparaíso']);
        App\Comuna::create(['nombre' => 'Marga Marga']);
    }
}
