<?php

use Illuminate\Database\Seeder;

class CuentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Cuenta::create(['numero' => '012-247-0296', 'tipo_cuenta_id' =>1, 'banco_id' =>1]);
        App\Cuenta::create(['numero' => '014-00-0096', 'tipo_cuenta_id' =>1, 'banco_id' =>2]);
    }
}
