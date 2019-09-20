<?php

use Illuminate\Database\Seeder;

class InteresesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Interes::create(['cantidad' => 2]);
    }
}
